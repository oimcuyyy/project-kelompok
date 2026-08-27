@extends('layouts.app')

@section('title', 'Dashboard Admin & Pesanan')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-black font-serif text-[#29170e]">Dashboard & Riwayat Pesanan</h1>
            <p class="text-stone-600 mt-2">Kelola pesanan pelanggan dan verifikasi pembayaran transfer.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('recipes.create') }}" class="text-xs font-bold uppercase tracking-wider text-white bg-emerald-600 hover:bg-emerald-700 transition flex items-center gap-1.5 px-4 py-2 rounded-full shadow-xs">
                <i class="fa-solid fa-plus"></i> Tambah Menu
            </a>
            <a href="{{ route('home') }}" class="text-xs font-bold uppercase tracking-wider text-[#431407] hover:text-amber-700 transition flex items-center gap-1.5 bg-white border border-[#d9c7b0] px-4 py-2 rounded-full shadow-xs">
                <i class="fa-solid fa-store"></i> Halaman Depan
            </a>
            <a href="{{ route('admin.logout') }}" class="text-xs font-bold uppercase tracking-wider text-red-600 hover:text-red-700 transition flex items-center gap-1.5 bg-red-50 border border-red-200 px-4 py-2 rounded-full shadow-xs">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar
            </a>
        </div>
    </div>

    @if($orders->isEmpty())
        <div class="text-center py-16 bg-white rounded-3xl border border-[#d9c7b0]">
            <i class="fa-solid fa-receipt text-5xl text-stone-300 mb-4"></i>
            <h3 class="text-xl font-bold font-serif text-[#29170e]">Belum Ada Transaksi</h3>
            <p class="text-stone-500 mt-2">Pesanan yang dibuat oleh pelanggan akan muncul di sini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($orders as $order)
                <div class="bg-white rounded-2xl border border-amber-900/10 shadow-sm overflow-hidden flex flex-col">
                    <div class="bg-[#faf5ee] px-5 py-4 border-b border-amber-900/10 flex justify-between items-center">
                        <div>
                            <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">ORDER #{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</span>
                            <div class="text-xs text-stone-500 font-medium mt-0.5">{{ $order->created_at->format('d M Y - H:i') }}</div>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            @if($order->status === 'success')
                                <span class="bg-emerald-100 text-emerald-800 text-[9px] font-bold px-2 py-0.5 rounded-full border border-emerald-200 uppercase">
                                    <i class="fa-solid fa-check mr-1"></i>Selesai
                                </span>
                            @elseif($order->status === 'pending')
                                <span class="bg-amber-100 text-amber-800 text-[9px] font-bold px-2 py-0.5 rounded-full border border-amber-200 uppercase">
                                    <i class="fa-solid fa-clock mr-1"></i>Menunggu Verifikasi
                                </span>
                            @else
                                <span class="bg-red-100 text-red-800 text-[9px] font-bold px-2 py-0.5 rounded-full border border-red-200 uppercase">
                                    <i class="fa-solid fa-xmark mr-1"></i>Dibatalkan
                                </span>
                            @endif
                            <span class="bg-blue-100 text-blue-800 text-[9px] font-bold px-2 py-0.5 rounded-full border border-blue-200 uppercase">
                                {{ $order->payment_method ?? 'Cash' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="px-5 py-3 bg-stone-50 border-b border-stone-200 text-xs text-stone-600 font-medium space-y-1">
                        <div class="flex justify-between">
                            <span>Pelanggan:</span>
                            <span class="font-bold text-stone-800">{{ $order->customer_name ?: 'Guest' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tipe Pesanan:</span>
                            <span class="font-bold text-stone-800">{{ $order->order_type ?? 'Dine In' }}{{ $order->order_type === 'Dine In' && $order->table_number ? ' (Meja: ' . $order->table_number . ')' : '' }}</span>
                        </div>
                    </div>

                    <div class="p-5 flex-grow">
                        <ul class="space-y-3">
                            @foreach($order->items as $item)
                                <li class="flex justify-between items-start text-sm">
                                    <div class="flex-grow pr-4">
                                        <div class="font-bold text-stone-800 line-clamp-1">
                                            <span class="text-amber-600 mr-1">{{ $item->quantity }}x</span> 
                                            {{ $item->menu ? $item->menu->title : 'Menu Terhapus' }}
                                        </div>
                                        <div class="text-[11px] text-stone-500 mt-0.5">@ Rp {{ number_format($item->price, 0, ',', '.') }}</div>
                                    </div>
                                    <div class="font-bold text-stone-700 whitespace-nowrap">
                                        Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <div class="bg-stone-50 px-5 py-4 border-t border-stone-200 space-y-2">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-sm font-bold text-stone-600">Total</span>
                            <span class="text-lg font-black text-orange-700">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                        @if($order->payment_method === 'Tunai')
                        <div class="flex justify-between items-center text-xs text-stone-500">
                            <span>Uang Diterima</span>
                            <span>Rp {{ number_format($order->cash_received, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between items-center text-xs text-stone-500">
                            <span>Kembalian</span>
                            <span>Rp {{ number_format($order->change, 0, ',', '.') }}</span>
                        </div>
                        @endif

                        @if($order->transfer_proof)
                        <div class="mt-4 pt-4 border-t border-stone-200">
                            <span class="block text-xs font-bold text-stone-600 mb-2">Bukti Pembayaran:</span>
                            <a href="{{ asset($order->transfer_proof) }}" target="_blank" class="block rounded-lg overflow-hidden border border-stone-300 hover:opacity-80 transition">
                                <img src="{{ asset($order->transfer_proof) }}" alt="Bukti Transfer" class="w-full h-32 object-cover">
                            </a>
                        </div>
                        @endif

                        @if($order->status === 'pending')
                        <div class="flex gap-2 mt-4 pt-3">
                            <form action="{{ route('orders.verify', $order->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold py-2 rounded-lg transition"><i class="fa-solid fa-check mr-1"></i> Konfirmasi</button>
                            </form>
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="button" class="w-full bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-2 rounded-lg transition flex items-center justify-center gap-1" onclick="confirmCancel(this)">
                                    <i class="fa-solid fa-xmark"></i> Batalkan
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<!-- Script Polling Notifikasi Pesanan Baru -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let lastCheck = '{{ now()->toDateTimeString() }}';
        
        setInterval(async () => {
            try {
                const response = await fetch(`/api/orders/check-new?last_check=${encodeURIComponent(lastCheck)}`);
                const data = await response.json();
                
                if (data.new_orders > 0) {
                    // Mainkan suara notifikasi kecil jika memungkinkan (opsional)
                    // const audio = new Audio('/path/to/notification.mp3');
                    // audio.play().catch(e => console.log('Audio autoplay prevented'));

                    Swal.fire({
                        icon: 'info',
                        title: 'Pesanan Baru!',
                        text: `Ada ${data.new_orders} pesanan baru masuk!`,
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: true,
                        confirmButtonText: 'Muat Ulang',
                        confirmButtonColor: '#059669',
                        timer: 10000,
                        timerProgressBar: true,
                    }).then((result) => {
                        if (result.isConfirmed || result.dismiss === Swal.DismissReason.timer) {
                            window.location.reload();
                        }
                    });
                    
                    lastCheck = data.timestamp;
                } else {
                    lastCheck = data.timestamp;
                }
            } catch (err) {
                console.error('Error checking new orders:', err);
            }
        }, 10000); // Cek setiap 10 detik
    });

    function confirmCancel(button) {
        Swal.fire({
            title: 'Batalkan Pesanan?',
            text: 'Apakah Anda yakin ingin membatalkan pesanan ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#9ca3af',
            confirmButtonText: 'Ya, Batalkan!',
            cancelButtonText: 'Kembali'
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    }
</script>
@endsection
