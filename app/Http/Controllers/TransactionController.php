<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TransactionsExport;

class TransactionController extends Controller
{
    public function index()
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat melihat transaksi.');
        }
        
        $orders = Order::with('items.menu')->latest()->paginate(15);
        $maintenanceData = file_exists(storage_path('app/maintenance.json')) ? json_decode(file_get_contents(storage_path('app/maintenance.json')), true) : [];
        
        return view('transactions', compact('orders', 'maintenanceData'));
    }

    public function export()
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat mendownload transaksi.');
        }
        return Excel::download(new TransactionsExport, 'riwayat-transaksi-dapurkuliner-' . date('Y-m-d') . '.xlsx');
    }

    public function verify($id)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return back();
        $order = Order::findOrFail($id);
        $order->status = 'success';
        $order->save();
        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function cancel($id)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return back();
        $order = Order::findOrFail($id);
        $order->status = 'cancelled';
        $order->save();
        return back()->with('success', 'Pesanan telah dibatalkan.');
    }

    public function checkNew(Request $request)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return response()->json(['count' => 0]);
        $lastCheck = $request->query('last_check', now()->subSeconds(10)->toDateTimeString());
        $newOrders = Order::where('created_at', '>', $lastCheck)->count();
        return response()->json(['new_orders' => $newOrders, 'timestamp' => now()->toDateTimeString()]);
    }
}
