<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout(Request $request)
    {
        $lastOrderTime = session('last_order_time');
        if ($lastOrderTime) {
            $diff = abs(now()->diffInSeconds(\Carbon\Carbon::parse($lastOrderTime)));
            if ($diff < 15) {
                return response()->json(['success' => false, 'message' => 'Anda memesan terlalu cepat. Silakan tunggu 15 detik.'], 429);
            }
        }

        $request->validate([
            'customer_name' => 'nullable|string|max:100',
            'order_type' => 'required|string|in:Dine In,Take Away',
            'table_number' => 'nullable|string|max:20',
            'payment_method' => 'required|string|in:Tunai,Midtrans',
        ]);

        try {
            $pendingOrders = session('pending_orders', []);
            if (!empty($pendingOrders)) {
                $pendingOrders = \App\Models\Order::whereIn('id', $pendingOrders)
                    ->whereIn('status', ['pending', 'unpaid'])
                    ->pluck('id')
                    ->toArray();
                session(['pending_orders' => $pendingOrders]);
            }
            
            if (count($pendingOrders) >= 2) {
                return response()->json(['success' => false, 'message' => 'Anda memiliki 2 pesanan yang belum dibayar. Harap selesaikan pembayaran sebelumnya atau hubungi kasir.'], 400);
            }

            $cart = is_string($request->input('cart')) ? json_decode($request->input('cart'), true) : $request->input('cart');
            $customerName = $request->input('customer_name');
            $orderType = $request->input('order_type', 'Dine In');
            $tableNumber = $request->input('table_number');
            $paymentMethod = $request->input('payment_method', 'Tunai');
            $cashReceived = $request->input('cash_received', 0);

            if (!$cart || empty($cart) || !is_array($cart)) {
                return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid!'], 400);
            }

            if (count($cart) > 50) {
                return response()->json(['success' => false, 'message' => 'Terlalu banyak item dalam satu pesanan (Maks 50).'], 400);
            }

            $calculatedTotalPrice = 0;
            $validCart = [];
            foreach ($cart as $item) {
                if (!isset($item['id'], $item['quantity'])) continue;
                
                $recipe = \App\Models\Recipe::find($item['id']);
                if (!$recipe) {
                    return response()->json(['success' => false, 'message' => 'Terdapat menu yang tidak valid/tidak ditemukan dalam keranjang.'], 400);
                }
                
                $qty = (int) $item['quantity'];
                if ($qty <= 0) continue;
                
                $price = $recipe->price;
                $calculatedTotalPrice += ($price * $qty);
                
                $validCart[] = [
                    'id' => $recipe->id,
                    'quantity' => $qty,
                    'price' => $price
                ];
            }
            
            if (empty($validCart)) {
                return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid!'], 400);
            }

            $change = 0;
            if ($paymentMethod === 'Tunai') {
                if ($cashReceived < $calculatedTotalPrice) {
                    return response()->json(['success' => false, 'message' => 'Uang tunai kurang dari total tagihan!'], 400);
                }
                $change = $cashReceived - $calculatedTotalPrice;
            }

            if ($orderType === 'Dine In') {
                if (empty(trim($tableNumber))) {
                    return response()->json(['success' => false, 'message' => 'Nomor meja wajib diisi untuk Makan di Tempat!'], 400);
                }
                if (empty(trim($customerName))) {
                    return response()->json(['success' => false, 'message' => 'Nama pelanggan wajib diisi untuk Makan di Tempat!'], 400);
                }

                $isTableBusy = \App\Models\Order::where('table_number', trim($tableNumber))
                    ->where('order_type', 'Dine In')
                    ->whereIn('status', ['pending', 'unpaid'])
                    ->exists();

                if ($isTableBusy) {
                    return response()->json(['success' => false, 'message' => "Meja nomor {$tableNumber} sedang sibuk (masih ada pesanan pending/belum lunas)."], 400);
                }
            }

            $status = ($paymentMethod === 'Tunai') ? 'success' : 'pending';
            session(['last_order_time' => now()]);

            $order = \App\Models\Order::create([
                'total_price' => $calculatedTotalPrice,
                'status' => $status,
                'customer_name' => $customerName ? htmlspecialchars(strip_tags($customerName)) : null,
                'order_type' => htmlspecialchars(strip_tags($orderType)),
                'table_number' => $tableNumber ? htmlspecialchars(strip_tags($tableNumber)) : null,
                'payment_method' => htmlspecialchars(strip_tags($paymentMethod)),
                'cash_received' => $paymentMethod === 'Tunai' ? $cashReceived : 0,
                'change' => $change,
                'transfer_proof' => null,
            ]);
            
            if (in_array($status, ['pending', 'unpaid'])) {
                $pendingOrders[] = $order->id;
                session(['pending_orders' => $pendingOrders]);
            }

            foreach ($validCart as $item) {
                \App\Models\OrderItem::create([
                    'order_id' => $order->id,
                    'recipe_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            if ($paymentMethod === 'Midtrans') {
                $params = [
                    'transaction_details' => [
                        'order_id' => $order->id,
                        'gross_amount' => $calculatedTotalPrice,
                    ],
                    'customer_details' => [
                        'first_name' => $customerName ?: 'Guest',
                    ],
                ];

                try {
                    $snapToken = Snap::getSnapToken($params);
                    return response()->json(['success' => true, 'order_id' => $order->id, 'snap_token' => $snapToken]);
                } catch (\Exception $e) {
                    return response()->json(['success' => false, 'message' => 'Midtrans Error: ' . $e->getMessage()], 500);
                }
            }
        
            return response()->json(['success' => true, 'order_id' => $order->id]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Internal Error: ' . $e->getMessage()], 500);
        }
    }

    public function process(Request $request)
    {
        $orderId = 'ORDER-' . time();
        $grossAmount = 50000;

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
            'customer_details' => [
                'first_name' => 'Budi',
                'last_name' => 'Setiawan',
                'email' => 'budi@example.com',
                'phone' => '08123456789',
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('checkout', compact('snapToken', 'orderId', 'grossAmount'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mendapatkan token pembayaran: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if (hash_equals($hashed, $request->signature_key)) {
            $order = \App\Models\Order::find($request->order_id);
            if ($order) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->update(['status' => 'success']);
                    Log::info('Pembayaran berhasil untuk pesanan: ' . $request->order_id);
                } elseif ($request->transaction_status == 'pending') {
                    Log::info('Pembayaran tertunda untuk pesanan: ' . $request->order_id);
                } elseif ($request->transaction_status == 'deny' || $request->transaction_status == 'expire' || $request->transaction_status == 'cancel') {
                    $order->update(['status' => 'cancelled']);
                    Log::info('Pembayaran dibatalkan/kadaluarsa untuk pesanan: ' . $request->order_id);
                }
            }
        }
        
        return response()->json(['message' => 'Callback received']);
    }
}
