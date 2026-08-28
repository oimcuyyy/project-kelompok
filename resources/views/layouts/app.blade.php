<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DapurKuliner - Rumah Menu & Cita Rasa Masakan Nusantara dan Mancanegara.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DapurKuliner Resto - Pesan Makanan Online')</title>

    <!-- Favicon Logo DapurKuliner -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23f59e0b'/%3E%3Cstop offset='50%25' stop-color='%23ea580c'/%3E%3Cstop offset='100%25' stop-color='%239a3412'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='512' height='512' rx='128' fill='url(%23g)'/%3E%3Cg fill='%23ffffff' transform='translate(100,100) scale(0.61)'%3E%3Cpath d='M120 40 C120 20 100 20 100 40 L100 160 C100 190 120 210 150 210 L150 460 C150 480 170 480 170 460 L170 210 C200 210 220 190 220 160 L220 40 C220 20 200 20 200 40 L200 130 C200 140 190 150 180 150 L180 40 C180 20 160 20 160 40 L160 150 C150 150 140 140 140 130 L140 40 C140 20 120 20 120 40 Z'/%3E%3Cpath d='M350 40 C320 60 300 120 300 200 C300 215 310 225 325 225 L340 225 L340 460 C340 480 360 480 360 460 L360 40 C360 25 355 35 350 40 Z'/%3E%3Cpath d='M255 30 C205 30 190 85 190 140 C190 195 220 215 245 220 L245 460 C245 480 265 480 265 460 L265 220 C290 215 320 195 320 140 C320 85 305 30 255 30 Z'/%3E%3C/g%3E%3C/svg%3E">
    <link rel="alternate icon" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display (Aesthetic Resto) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                    },
                    colors: {
                        resto: {
                            dark: '#1c120c',
                            wood: '#431407',
                            amber: '#d97706',
                            gold: '#f59e0b',
                            cream: '#faf5ee',
                            warm: '#f5ede2',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Vite Assets (CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#fdfaf5] text-stone-800 flex flex-col min-h-screen selection:bg-amber-500 selection:text-white" x-data="kasirApp()">

    <!-- Header / Navbar Resto -->
    @include('layouts.partials.navbar')

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Resto -->
    @include('layouts.partials.footer')

    <!-- Floating Cart Button -->
    <button 
        x-show="cart.length > 0" 
        x-transition.scale.origin.bottom.right
        @click="isCartOpen = true"
        class="fixed bottom-6 right-6 z-40 bg-gradient-to-r from-amber-600 to-orange-700 hover:from-amber-700 hover:to-orange-800 text-white p-4 rounded-full shadow-2xl flex items-center gap-3 group border border-amber-500/50"
    >
        <div class="relative">
            <i class="fa-solid fa-cart-shopping text-xl"></i>
            <span class="absolute -top-3 -right-3 bg-red-600 text-white text-[10px] font-black w-5 h-5 flex items-center justify-center rounded-full border-2 border-orange-700" x-text="totalItems"></span>
        </div>
        <div class="text-left hidden sm:block">
            <div class="text-[10px] uppercase tracking-wider font-bold opacity-80">Total Pesanan</div>
            <div class="text-sm font-black" x-text="formatRupiah(totalPrice)"></div>
        </div>
    </button>

    <!-- Cart Sidebar / Modal -->
    <div 
        x-show="isCartOpen" 
        style="display: none;"
        class="fixed inset-0 z-50 overflow-hidden" 
        aria-labelledby="slide-over-title" 
        role="dialog" 
        aria-modal="true"
    >
        <!-- Background Overlay -->
        <div 
            x-show="isCartOpen"
            x-transition.opacity
            class="absolute inset-0 bg-stone-900/70 backdrop-blur-sm transition-opacity" 
            @click="isCartOpen = false"
        ></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex">
            <!-- Sidebar Panel -->
            <div 
                x-show="isCartOpen"
                x-transition:enter="transform transition ease-in-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="w-screen max-w-md"
            >
                <div class="h-full flex flex-col bg-white shadow-xl border-l border-amber-900/10">
                    <!-- Header -->
                    <div class="px-6 py-5 bg-[#2a170d] text-amber-50 flex items-center justify-between shadow-md">
                        <h2 class="text-lg font-black font-serif flex items-center gap-2">
                            <i class="fa-solid fa-cash-register text-amber-400"></i>
                            Keranjang Pesanan
                        </h2>
                        <button @click="isCartOpen = false" class="text-amber-300 hover:text-white transition">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    <!-- Cart Items -->
                    <div class="flex-1 overflow-y-auto p-6 bg-[#faf5ee]">
                        <template x-if="cart.length === 0">
                            <div class="text-center py-12">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 text-stone-300 text-3xl shadow-sm border border-stone-200">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </div>
                                <p class="text-stone-500 font-medium">Keranjang masih kosong.</p>
                                <button @click="isCartOpen = false" class="mt-4 text-amber-700 font-bold text-sm hover:underline">Mulai Pesan Menu</button>
                            </div>
                        </template>

                        <ul role="list" class="-my-4 divide-y divide-amber-900/10">
                            <template x-for="item in cart" :key="item.id">
                                <li class="py-4 flex gap-4">
                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-xl border border-stone-200 bg-white">
                                        <img :src="item.image" alt="Menu" class="h-full w-full object-cover object-center">
                                    </div>

                                    <div class="flex flex-1 flex-col">
                                        <div>
                                            <div class="flex justify-between text-sm font-bold text-stone-800">
                                                <h3 x-text="item.title" class="line-clamp-1"></h3>
                                                <p class="ml-4" x-text="formatRupiah(item.price * item.quantity)"></p>
                                            </div>
                                            <p class="mt-1 text-[11px] text-stone-500 font-medium" x-text="formatRupiah(item.price) + ' / porsi'"></p>
                                        </div>
                                        <div class="flex flex-1 items-end justify-between text-sm">
                                            <!-- Qty Controls -->
                                            <div class="flex items-center border border-stone-300 rounded-lg overflow-hidden bg-white shadow-xs">
                                                <button @click="decreaseQty(item.id)" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 hover:text-amber-700 transition">
                                                    <i class="fa-solid fa-minus text-[10px]"></i>
                                                </button>
                                                <span class="px-2 py-1 text-xs font-bold text-stone-800 min-w-[1.5rem] text-center" x-text="item.quantity"></span>
                                                <button @click="increaseQty(item.id)" class="px-2.5 py-1 text-stone-600 hover:bg-stone-100 hover:text-amber-700 transition">
                                                    <i class="fa-solid fa-plus text-[10px]"></i>
                                                </button>
                                            </div>

                                            <div class="flex">
                                                <button @click="removeFromCart(item.id)" type="button" class="font-bold text-xs text-rose-600 hover:text-rose-500 flex items-center gap-1">
                                                    <i class="fa-regular fa-trash-can"></i> Hapus
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <!-- Footer Checkout -->
                    <div class="border-t border-amber-900/10 px-6 py-5 bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                        <div class="flex justify-between text-base font-black text-stone-900 mb-4">
                            <p>Total Tagihan</p>
                            <p class="text-orange-700 text-xl" x-text="formatRupiah(totalPrice)"></p>
                        </div>
                        
                        <button 
                            @click="isPaymentOpen = true; isCartOpen = false;"
                            :disabled="cart.length === 0"
                            :class="cart.length === 0 ? 'opacity-50 cursor-not-allowed' : 'hover:scale-[1.02] transform transition shadow-lg shadow-amber-600/30'"
                            class="w-full flex items-center justify-center gap-2 rounded-full border border-transparent bg-gradient-to-r from-amber-600 to-orange-600 px-6 py-3.5 text-sm font-extrabold text-white uppercase tracking-widest"
                        >
                            <i class="fa-solid fa-cash-register"></i>
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Sidebar / Modal -->
    <div 
        x-show="isPaymentOpen" 
        style="display: none;"
        class="fixed inset-0 z-50 overflow-hidden" 
        aria-labelledby="payment-title" 
        role="dialog" 
        aria-modal="true"
    >
        <div 
            x-show="isPaymentOpen"
            x-transition.opacity
            class="absolute inset-0 bg-stone-900/70 backdrop-blur-sm transition-opacity" 
            @click="isPaymentOpen = false"
        ></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex">
            <div 
                x-show="isPaymentOpen"
                x-transition:enter="transform transition ease-in-out duration-300"
                x-transition:enter-start="translate-x-full"
                x-transition:enter-end="translate-x-0"
                x-transition:leave="transform transition ease-in-out duration-300"
                x-transition:leave-start="translate-x-0"
                x-transition:leave-end="translate-x-full"
                class="w-screen max-w-md"
            >
                <div class="h-full flex flex-col bg-white shadow-xl border-l border-amber-900/10">
                    <!-- Header -->
                    <div class="px-6 py-5 bg-[#2a170d] text-amber-50 flex items-center justify-between shadow-md">
                        <h2 class="text-lg font-black font-serif flex items-center gap-2">
                            <i class="fa-solid fa-wallet text-amber-400"></i>
                            Pembayaran
                        </h2>
                        <button @click="isPaymentOpen = false" class="text-amber-300 hover:text-white transition">
                            <i class="fa-solid fa-xmark text-xl"></i>
                        </button>
                    </div>

                    <div class="flex-1 overflow-y-auto p-6 bg-[#faf5ee]">
                        <!-- Order Details -->
                        <div class="mb-4 space-y-3">
                            <div>
                                <label class="block text-sm font-bold text-stone-700 mb-1">Tipe Pesanan</label>
                                <div class="flex gap-2">
                                    <button @click="orderType = 'Dine In'" :class="orderType === 'Dine In' ? 'bg-amber-600 text-white' : 'bg-white text-stone-600'" class="flex-1 py-2 px-3 border border-amber-200 rounded-lg font-bold text-sm">Dine In</button>
                                    <button @click="orderType = 'Take Away'" :class="orderType === 'Take Away' ? 'bg-amber-600 text-white' : 'bg-white text-stone-600'" class="flex-1 py-2 px-3 border border-amber-200 rounded-lg font-bold text-sm">Take Away</button>
                                </div>
                            </div>
                            
                            <template x-if="orderType === 'Dine In'">
                                <div>
                                    <label class="block text-sm font-bold text-stone-700 mb-1">Nomor Meja <span class="text-red-500 text-xs">(Wajib)</span></label>
                                    <input type="text" x-model="tableNumber" class="w-full px-3 py-2 border border-amber-200 rounded-lg text-sm bg-white focus:outline-none focus:border-amber-500">
                                </div>
                            </template>
                            
                            <div>
                                <label class="block text-sm font-bold text-stone-700 mb-1">Nama Pelanggan <span x-text="orderType === 'Dine In' ? '(Wajib)' : '(Opsional)'" :class="orderType === 'Dine In' ? 'text-red-500 text-xs' : 'text-stone-500 text-xs'"></span></label>
                                <input type="text" x-model="customerName" class="w-full px-3 py-2 border border-amber-200 rounded-lg text-sm bg-white focus:outline-none focus:border-amber-500">
                            </div>
                        </div>

                        <hr class="border-amber-900/10 my-4">

                        <!-- Payment Method -->
                        <div class="mb-4 space-y-3">
                            <label class="block text-sm font-bold text-stone-700 mb-1">Metode Pembayaran</label>
                            <div class="flex gap-2">
                                <button @click="paymentMethod = 'Tunai'" :class="paymentMethod === 'Tunai' ? 'bg-green-600 text-white' : 'bg-white text-stone-600'" class="flex-1 py-2 px-2 border border-stone-200 rounded-lg font-bold text-xs"><i class="fa-solid fa-money-bill-wave mb-1 block"></i>Tunai</button>
                                <button @click="paymentMethod = 'Transfer'" :class="paymentMethod === 'Transfer' ? 'bg-blue-600 text-white' : 'bg-white text-stone-600'" class="flex-1 py-2 px-2 border border-stone-200 rounded-lg font-bold text-xs"><i class="fa-solid fa-building-columns mb-1 block"></i>Transfer</button>
                                <button @click="paymentMethod = 'QRIS'" :class="paymentMethod === 'QRIS' ? 'bg-purple-600 text-white' : 'bg-white text-stone-600'" class="flex-1 py-2 px-2 border border-stone-200 rounded-lg font-bold text-xs"><i class="fa-solid fa-qrcode mb-1 block"></i>QRIS</button>
                            </div>
                        </div>

                        <div x-show="paymentMethod === 'Tunai'" class="space-y-4">
                                <div>
                                    <label class="block text-sm font-bold text-stone-700 mb-1">Uang Diterima</label>
                                    <input type="number" x-model.number="cashReceived" class="w-full px-3 py-2 border border-green-200 rounded-lg text-lg font-bold bg-white focus:outline-none focus:border-green-500">
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    <button type="button" @click="setCash(totalPrice)" class="px-3 py-1.5 bg-green-100 text-green-700 text-xs font-bold rounded-lg border border-green-200">Uang Pas</button>
                                    <button type="button" @click="setCash(50000)" class="px-3 py-1.5 bg-green-100 text-green-700 text-xs font-bold rounded-lg border border-green-200">50.000</button>
                                    <button type="button" @click="setCash(100000)" class="px-3 py-1.5 bg-green-100 text-green-700 text-xs font-bold rounded-lg border border-green-200">100.000</button>
                                    <button type="button" @click="setCash(200000)" class="px-3 py-1.5 bg-green-100 text-green-700 text-xs font-bold rounded-lg border border-green-200">200.000</button>
                                </div>
                                <div class="p-4 bg-green-50 border border-green-200 rounded-xl flex justify-between items-center">
                                    <span class="font-bold text-green-800">Kembalian:</span>
                                    <span class="font-black text-xl text-green-600" x-text="formatRupiah(changeAmount)"></span>
                                </div>
                        </div>
                        
                        <div x-show="paymentMethod === 'Transfer'">
                            <div class="p-4 bg-blue-50 border border-blue-200 rounded-xl">
                                <h3 class="font-bold text-blue-800 mb-2"><i class="fa-solid fa-building-columns"></i> Info Rekening</h3>
                                <p class="text-sm text-blue-900 mb-3">BCA Virtual Account<br><b>8801 2938 1029 4812</b><br>(a.n. DapurKuliner Resto)</p>
                                
                                <div class="mt-2">
                                    <label class="block text-xs font-bold text-blue-900 mb-1">Unggah Bukti Transfer</label>
                                    <input type="file" id="transferProofInput" @change="handleFileUpload($event)" accept="image/*" class="w-full text-xs text-stone-600 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200">
                                </div>
                            </div>
                        </div>
                        
                        <div x-show="paymentMethod === 'QRIS'">
                            <div class="p-4 bg-purple-50 border border-purple-200 rounded-xl text-center">
                                <h3 class="font-bold text-purple-800 mb-2"><i class="fa-solid fa-qrcode"></i> QRIS Pembayaran</h3>
                                <div class="bg-white p-4 inline-block rounded-lg shadow-sm mb-2 border border-purple-100">
                                    <img :src="totalPrice > 0 ? 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=' + encodeURIComponent(dynamicQris) : 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=Kosong'" alt="QRIS Code" class="w-48 h-48 mx-auto">
                                </div>
                                <p class="text-xs text-purple-900 mb-3">Silakan scan dengan aplikasi e-Wallet atau m-Banking Anda.</p>
                                
                                <div class="mt-2 text-left">
                                    <label class="block text-xs font-bold text-purple-900 mb-1">Unggah Bukti Pembayaran QRIS</label>
                                    <input type="file" id="qrisProofInput" @change="handleFileUpload($event)" accept="image/*" class="w-full text-xs text-stone-600 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200">
                                </div>
                        </div>

                    </div>

                    <!-- Footer Checkout -->
                    <div class="border-t border-amber-900/10 px-6 py-5 bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
                        <div class="flex justify-between text-base font-black text-stone-900 mb-4">
                            <p>Total Tagihan</p>
                            <p class="text-orange-700 text-2xl" x-text="formatRupiah(totalPrice)"></p>
                        </div>

                        <!-- Cloudflare Turnstile untuk Anti Spam -->
                        <div class="mb-4 flex justify-center">
                            <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY', '3x00000000000000000000FF') }}" data-theme="light"></div>
                        </div>
                        
                        <button 
                            @click="checkout()"
                            :disabled="isProcessing || isUploadingImage || (paymentMethod === 'Tunai' && cashReceived < totalPrice)"
                            :class="(isProcessing || isUploadingImage || (paymentMethod === 'Tunai' && cashReceived < totalPrice)) ? 'opacity-50 cursor-not-allowed bg-stone-400' : 'bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 shadow-lg shadow-amber-600/30'"
                            class="w-full flex items-center justify-center gap-2 rounded-full border border-transparent px-6 py-4 text-sm font-extrabold text-white uppercase tracking-widest transition-all"
                        >
                            <i class="fa-solid fa-check-double" x-show="!isProcessing"></i>
                            <i class="fa-solid fa-spinner fa-spin" x-show="isProcessing"></i>
                            <span x-text="isProcessing ? 'Memproses...' : 'Konfirmasi Pembayaran'"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Script Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('kasirApp', () => ({
                isCartOpen: false,
                isPaymentOpen: false,
                cart: JSON.parse(localStorage.getItem('kasir_cart') || '[]'),
                customerName: '',
                orderType: 'Dine In',
                tableNumber: '',
                paymentMethod: 'Tunai',
                cashReceived: 0,
                transferProof: null, // Berisi File object jika masih menunggu upload, atau URL String setelah upload berhasil
                isUploadingImage: false,
                isProcessing: false,
                captchaA: Math.floor(Math.random() * 10) + 1,
                captchaB: Math.floor(Math.random() * 10) + 1,
                captchaAnswer: '',
                staticQris: '00020101021126570011ID.DANA.WWW011893600915301409631402090140963140303UMI51440014ID.CO.QRIS.WWW0215ID10265005804710303UMI5204594553033605802ID5910Imzzzstore6015Kota Jakarta Se6105122706304F45D',
                
                // --- API KEY IMGBB ---
                // GANTI STRING DI BAWAH INI DENGAN API KEY ANDA DARI api.imgbb.com
                imgbbApiKey: '0dadc727261b9f40dd61091b169dd797',
                
                init() {
                    this.$watch('cart', value => {
                        localStorage.setItem('kasir_cart', JSON.stringify(value));
                    });
                },

                // Fungsi Kompresi Gambar & Upload Otomatis ke ImgBB
                async handleFileUpload(event) {
                    const file = event.target.files[0];
                    if (!file) return;

                    if (!file.type.startsWith('image/')) {
                        Swal.fire('Format Salah', 'Harap unggah file berupa gambar/foto.', 'error');
                        event.target.value = '';
                        return;
                    }

                    if (this.imgbbApiKey.trim() === '' || this.imgbbApiKey.includes('YOUR_IMGBB')) {
                        Swal.fire('API Key ImgBB Belum Diatur!', 'Anda belum memasukkan API Key ImgBB pada baris kode (imgbbApiKey) di app.blade.php', 'error');
                        event.target.value = '';
                        return;
                    }

                    this.isUploadingImage = true;
                    
                    try {
                        // 1. Kompresi gambar terlebih dahulu
                        const compressedFile = await this.compressImage(file, 800, 0.7);
                        
                        // 2. Kirim ke ImgBB
                        const formData = new FormData();
                        formData.append('image', compressedFile);
                        
                        // Tampilkan loading upload
                        Swal.fire({
                            title: 'Mengunggah Gambar...',
                            text: 'Mohon tunggu sebentar.',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });

                        const response = await fetch(`https://api.imgbb.com/1/upload?key=${this.imgbbApiKey}`, {
                            method: 'POST',
                            body: formData
                        });
                        
                        const result = await response.json();
                        
                        if (result.success) {
                            this.transferProof = result.data.url; // Simpan URL, bukan file fisik
                            Swal.close();
                        } else {
                            throw new Error('Gagal mengunggah ke ImgBB');
                        }
                    } catch (error) {
                        console.error('Upload error:', error);
                        Swal.fire('Upload Gagal', 'Gagal memproses dan mengunggah gambar. Pastikan internet stabil.', 'error');
                        event.target.value = '';
                        this.transferProof = null;
                    } finally {
                        this.isUploadingImage = false;
                    }
                },

                compressImage(file, maxDimension, quality) {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = event => {
                            const img = new Image();
                            img.src = event.target.result;
                            img.onload = () => {
                                const canvas = document.createElement('canvas');
                                let width = img.width;
                                let height = img.height;

                                if (width > height) {
                                    if (width > maxDimension) {
                                        height *= maxDimension / width;
                                        width = maxDimension;
                                    }
                                } else {
                                    if (height > maxDimension) {
                                        width *= maxDimension / height;
                                        height = maxDimension;
                                    }
                                }

                                canvas.width = width;
                                canvas.height = height;
                                const ctx = canvas.getContext('2d');
                                ctx.drawImage(img, 0, 0, width, height);

                                canvas.toBlob(blob => {
                                    if(blob) {
                                        // Buat File object baru dari blob
                                        const newFile = new File([blob], file.name, {
                                            type: file.type,
                                            lastModified: Date.now()
                                        });
                                        resolve(newFile);
                                    } else {
                                        reject(new Error("Canvas toBlob failed"));
                                    }
                                }, file.type, quality);
                            };
                            img.onerror = error => reject(error);
                        };
                        reader.onerror = error => reject(error);
                    });
                },

                crc16(str) {
                    let crc = 0xffff;
                    for (let i = 0; i < str.length; i++) {
                        crc ^= str.charCodeAt(i) << 8;
                        for (let j = 0; j < 8; j++) {
                            crc = (crc & 0x8000) ? (crc << 1) ^ 0x1021 : crc << 1;
                            crc &= 0xffff;
                        }
                    }
                    return crc.toString(16).toUpperCase().padStart(4, "0");
                },

                get dynamicQris() {
                    if (this.totalPrice === 0) return '';
                    let body = this.staticQris.trim().slice(0, -8);
                    body = body.replace("010211", "010212"); // Ubah jadi dinamis
                    body = body.replace(/54\d{2}\d+(?=5[5-9]|6[0-9]|8[0-9])/, ""); // Hapus tag nominal kalau ada
                    const amtStr = String(this.totalPrice);
                    const tag54 = "54" + String(amtStr.length).padStart(2, "0") + amtStr;
                    body = body.includes("5802ID")
                        ? body.replace("5802ID", tag54 + "5802ID")
                        : body + tag54;
                    const w = body + "6304";
                    return w + this.crc16(w);
                },

                addToCart(menu) {
                    const existingItem = this.cart.find(item => item.id === menu.id);
                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        this.cart.push({
                            id: menu.id,
                            title: menu.title,
                            price: menu.price,
                            image: menu.image,
                            quantity: 1
                        });
                    }
                    this.isCartOpen = true; // Open cart automatically
                },

                increaseQty(id) {
                    const item = this.cart.find(i => i.id === id);
                    if (item) item.quantity += 1;
                },

                decreaseQty(id) {
                    const item = this.cart.find(i => i.id === id);
                    if (item && item.quantity > 1) {
                        item.quantity -= 1;
                    } else if (item && item.quantity === 1) {
                        this.removeFromCart(id);
                    }
                },

                removeFromCart(id) {
                    this.cart = this.cart.filter(item => item.id !== id);
                },

                get totalItems() {
                    return this.cart.reduce((total, item) => total + item.quantity, 0);
                },

                get totalPrice() {
                    return this.cart.reduce((total, item) => total + (item.price * item.quantity), 0);
                },

                get changeAmount() {
                    const change = this.cashReceived - this.totalPrice;
                    return change > 0 ? change : 0;
                },

                setCash(amount) {
                    this.cashReceived = amount;
                },

                formatRupiah(amount) {
                    return new Intl.NumberFormat('id-ID', {
                        style: 'currency',
                        currency: 'IDR',
                        minimumFractionDigits: 0
                    }).format(amount);
                },

                async checkout() {
                    if (this.isProcessing) return;
                    if (this.cart.length === 0) return;
                    
                    this.isProcessing = true;
                    try {
                        if (this.orderType === 'Dine In') {
                            if (!this.tableNumber || this.tableNumber.trim() === '') {
                                Swal.fire({ icon: 'warning', title: 'Mohon Maaf', text: 'Nomor meja wajib diisi untuk pesanan Makan di Tempat (Dine In)!', confirmButtonColor: '#d97706' });
                                return;
                            }
                            if (!this.customerName || this.customerName.trim() === '') {
                                Swal.fire({ icon: 'warning', title: 'Mohon Maaf', text: 'Nama pelanggan wajib diisi untuk pesanan Makan di Tempat (Dine In)!', confirmButtonColor: '#d97706' });
                                return;
                            }
                        }
                        if (this.paymentMethod === 'Tunai' && this.cashReceived < this.totalPrice) {
                            Swal.fire({ icon: 'warning', title: 'Oops...', text: 'Uang tunai kurang!', confirmButtonColor: '#d97706' });
                            return;
                        }
                        if ((this.paymentMethod === 'Transfer' || this.paymentMethod === 'QRIS') && !this.transferProof) {
                            Swal.fire({ icon: 'warning', title: 'Oops...', text: 'Mohon unggah bukti transfer/pembayaran!', confirmButtonColor: '#d97706' });
                            return;
                        }
                        
                        let formData = new FormData();
                        formData.append('cart', JSON.stringify(this.cart));
                        formData.append('total_price', this.totalPrice);
                        formData.append('customer_name', this.customerName);
                        formData.append('order_type', this.orderType);
                        formData.append('table_number', this.tableNumber);
                        formData.append('payment_method', this.paymentMethod);
                        formData.append('cash_received', this.paymentMethod === 'Tunai' ? this.cashReceived : 0);
                        formData.append('change', this.paymentMethod === 'Tunai' ? this.changeAmount : 0);
                        
                        const turnstileToken = document.querySelector('[name="cf-turnstile-response"]')?.value;
                        if (!turnstileToken) {
                            Swal.fire({ icon: 'warning', title: 'Verifikasi Gagal', text: 'Silakan selesaikan validasi Anti-Spam (Cloudflare Turnstile) terlebih dahulu.', confirmButtonColor: '#d97706' });
                            this.isProcessing = false;
                            return;
                        }
                        formData.append('cf-turnstile-response', turnstileToken);
                        
                        if (this.transferProof && typeof this.transferProof === 'string') {
                            formData.append('transfer_proof', this.transferProof);
                        }

                        const response = await fetch('/checkout', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                'Accept': 'application/json'
                            },
                            body: formData
                        });
                        
                        if (response.status === 413) {
                            Swal.fire({ icon: 'error', title: 'Gagal', text: 'Ukuran foto bukti pembayaran terlalu besar.', confirmButtonColor: '#d97706' });
                            return;
                        }
                        if (response.status === 429) {
                            Swal.fire({ icon: 'error', title: 'Terlalu Cepat', text: 'Sistem mendeteksi spam! Tunggu sebentar.', confirmButtonColor: '#d97706' });
                            return;
                        }

                        let result;
                        try {
                            result = await response.json();
                        } catch (e) {
                            throw new Error('Respon server tidak valid atau terjadi error sistem.');
                        }
                        
                        if (result.success) {
                            Swal.fire({ icon: 'success', title: 'Pesanan Berhasil!', text: 'Terima kasih atas pesanan Anda.', confirmButtonColor: '#059669' }).then(() => {
                                this.cart = []; this.cashReceived = 0; this.customerName = ''; this.tableNumber = ''; this.transferProof = null; this.isPaymentOpen = false;
                                if (document.getElementById('transferProofInput')) document.getElementById('transferProofInput').value = '';
                                if (document.getElementById('qrisProofInput')) document.getElementById('qrisProofInput').value = '';
                                if (window.turnstile) turnstile.reset();
                            });
                        } else {
                            if (window.turnstile) turnstile.reset();
                            Swal.fire({ icon: 'error', title: 'Gagal', text: result.message || 'Gagal melakukan pesanan.', confirmButtonColor: '#d97706' });
                        }
                    } catch (error) {
                        console.error('Checkout error:', error);
                        if (window.turnstile) turnstile.reset();
                        Swal.fire({ icon: 'error', title: 'Error', text: 'Terjadi kesalahan sistem atau ukuran file terlalu besar untuk server.', confirmButtonColor: '#d97706' });
                    } finally {
                        this.isProcessing = false;
                    }
                }
            }));
        });
    </script>

    <!-- Admin Authentication Modal (Ctrl + Shift + L) -->
    @include('layouts.partials.admin_modal')

    <!-- Flash Messages -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    <script>
        // Global SweetAlert Delete Confirmation
        function confirmDelete(event, title, text) {
            event.preventDefault();
            const form = event.target;
            Swal.fire({
                title: title || 'Apakah Anda yakin?',
                text: text || 'Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>

    @stack('scripts')
</body>
</html>

