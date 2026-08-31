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
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function process(Request $request)
    {
        // Contoh: Membuat ID Order yang unik
        $orderId = 'ORDER-' . time();
        
        // Nominal pembayaran contoh
        $grossAmount = 50000;

        // Parameter pesanan
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

        // Mendapatkan Snap Token
        try {
            $snapToken = Snap::getSnapToken($params);
            
            // Tampilkan view checkout dengan mengirim token
            return view('checkout', compact('snapToken', 'orderId', 'grossAmount'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mendapatkan token pembayaran: ' . $e->getMessage());
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        
        if ($hashed == $request->signature_key) {
            $order = \App\Models\Order::find($request->order_id);
            if ($order) {
                if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                    $order->update(['status' => 'success']);
                    Log::info('Pembayaran berhasil untuk pesanan: ' . $request->order_id);
                } elseif ($request->transaction_status == 'pending') {
                    // Menunggu pembayaran (biarkan pending)
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
