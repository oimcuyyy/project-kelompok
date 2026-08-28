@extends('layouts.app')

@section('title', 'DapurKuliner - Buku Menu & POS')

@section('content')
    <!-- 2. Section Buku Menu & Kategori Hidangan -->
    <section id="menu" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Notifikasi Sukses -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-amber-100/80 border border-amber-400 text-amber-950 rounded-2xl font-bold flex items-center justify-between shadow-sm">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">🎉</span>
                    <span>{{ session('success') }}</span>
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-amber-800 hover:text-amber-950 text-sm font-bold">✕</button>
            </div>
        @endif

        <!-- Header Buku Menu -->
        <div id="kategori" class="mb-10">
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-6 border-b border-[#e2d6c7] pb-5">
                <div>
                    <div class="inline-flex items-center gap-2 text-xs font-black text-amber-700 uppercase tracking-widest mb-1.5">
                        <i class="fa-solid fa-book-open"></i> BUKU MENU RESTO
                    </div>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-serif text-[#29170e] tracking-tight">
                        Daftar Menu Makanan Spesial
                    </h2>
                </div>
                <div class="text-xs font-bold text-stone-500 bg-[#ede3d4] px-4 py-2 rounded-full">
                    Tersedia <span class="text-amber-700 font-extrabold text-sm">{{ $recipes->count() }}</span> menu hidangan
                </div>
            </div>

            <!-- Chips Filter Bar / Menu Tabs -->
            <div class="flex items-center gap-3 overflow-x-auto pb-3 pt-1 scrollbar-none">
                @php
                    $categoryIcons = [
                        'Semua' => 'fa-solid fa-utensils',
                        'Nusantara' => 'fa-solid fa-bowl-rice',
                        'Western' => 'fa-solid fa-pizza-slice',
                        'Asia' => 'fa-solid fa-bowl-food',
                        'Sehat' => 'fa-solid fa-leaf',
                        'Kue & Dessert' => 'fa-solid fa-cake-candles',
                        'Minuman' => 'fa-solid fa-glass-water',
                    ];
                @endphp

                @foreach($categories as $cat)
                    @php
                        $isActive = (request('category') == $cat) || (!request('category') && $cat == 'Semua');
                        $catUrl = $cat == 'Semua' ? route('menu.index') : route('menu.index', ['category' => $cat]);
                    @endphp
                    <a href="{{ $catUrl }}"
                       class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider transition-all flex items-center gap-2 whitespace-nowrap {{ $isActive ? 'bg-[#431407] text-amber-100 shadow-md border border-amber-600 scale-105' : 'bg-white text-stone-700 hover:bg-[#ede3d4] hover:text-[#431407] border border-[#e2d6c7] shadow-xs' }}">
                        <i class="{{ $categoryIcons[$cat] ?? 'fa-solid fa-tag' }} text-amber-500"></i>
                        <span>{{ $cat }}</span>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Banner Hasil Pencarian -->
        @if(request('search'))
            <div class="mb-10 p-5 bg-[#f5ede2] border border-[#d9c7b0] rounded-2xl flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 shadow-sm">
                <div class="flex items-center gap-3 text-sm text-stone-800 font-medium">
                    <div class="w-8 h-8 rounded-full bg-[#431407] text-amber-300 flex items-center justify-center shrink-0 text-xs">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                    <span>Ditemukan <strong class="text-amber-800 font-black text-base">{{ $recipes->count() }}</strong> hidangan untuk kata kunci: <strong class="bg-white border border-[#d9c7b0] px-2.5 py-1 rounded-lg text-[#29170e] font-black">"{{ request('search') }}"</strong></span>
                </div>
                <a href="{{ route('menu.index') }}" class="text-xs font-bold uppercase tracking-wider text-amber-800 hover:text-amber-950 bg-white border border-[#d9c7b0] px-4 py-2 rounded-full hover:bg-amber-50 transition shadow-sm flex items-center gap-1.5 shrink-0">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Tampilkan Semua Menu</span>
                </a>
            </div>
        @endif

        <!-- 3. List Card Menu Dinamis (Menu Platters) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($recipes as $recipe)
                @php
                    $badgeClass = match($recipe->category) {
                        'Nusantara' => 'badge-nusantara',
                        'Western' => 'badge-western',
                        'Asia' => 'badge-asia',
                        'Sehat' => 'badge-sehat',
                        'Kue & Dessert' => 'badge-dessert',
                        'Minuman' => 'badge-minuman',
                        default => 'badge-default'
                    };
                @endphp
                <a href="{{ route('recipes.show', $recipe->id) }}" class="block group">
                    <div class="resto-card bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-300 h-full flex flex-col border border-[#e8ded2]">
                        <!-- Image Container with Floating Badges -->
                        <div class="relative h-56 sm:h-60 overflow-hidden bg-stone-100">
                            <img
                                src="{{ $recipe->image }}"
                                alt="{{ $recipe->title }}"
                                loading="lazy"
                                class="resto-card-img w-full h-full object-cover group-hover:scale-108 transition-transform duration-500"
                            >
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>

                            <!-- Time Badge -->
                            <span class="absolute top-3.5 right-3.5 bg-[#1c120c]/90 backdrop-blur-md text-amber-300 text-xs font-bold px-3 py-1.5 rounded-full shadow-md flex items-center gap-1.5 border border-amber-500/30">
                                <i class="fa-solid fa-tag text-amber-400"></i>
                                <span>{{ $recipe->price }} Menit</span>
                            </span>

                            <!-- Category Badge -->
                            <span class="absolute bottom-3.5 left-3.5 {{ $badgeClass }} text-[11px] font-black uppercase tracking-wider px-3.5 py-1 rounded-full shadow-md">
                                {{ $recipe->category }}
                            </span>
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex flex-col flex-grow justify-between bg-white">
                            <div>
                                <h3 class="text-lg sm:text-xl font-bold font-serif text-[#29170e] group-hover:text-amber-700 transition-colors leading-snug line-clamp-1">
                                    {{ $recipe->title }}
                                </h3>
                                <p class="text-stone-600 text-xs sm:text-sm mt-2.5 line-clamp-2 leading-relaxed font-normal">
                                    {!! nl2br(e($recipe->description)) !!}
                                </p>
                            </div>

                            <!-- Card Footer Action -->
                            <div class="mt-6 pt-4 border-t border-[#f0e8dc] flex items-center justify-between text-xs font-bold text-stone-600">
                                <button 
                                    @click.prevent="addToCart({ id: {{ $recipe->id }}, title: '{{ addslashes($recipe->title) }}', price: {{ $recipe->price }}, image: '{{ $recipe->image }}' })"
                                    class="bg-amber-100 hover:bg-amber-500 text-amber-900 hover:text-white px-3 py-1.5 rounded-full transition-all flex items-center gap-1.5 uppercase tracking-wider text-[10px] font-black border border-amber-300"
                                >
                                    <i class="fa-solid fa-cart-plus"></i> Pesan
                                </button>
                                <span class="text-stone-400 font-medium text-[11px]">
                                    <i class="fa-solid fa-fire text-amber-600 mr-1"></i> Rp {{ number_format($recipe->price, 0, ',', '.') }}
                                </span>
                            </div>

                            @if(session('is_admin') || request()->cookie('is_admin_vercel') == 'true')
                                <!-- Quick Admin Actions on Card -->
                                <div class="mt-3 pt-3 border-t border-amber-100 flex items-center justify-between gap-2" onclick="event.stopPropagation();">
                                    <a href="{{ route('recipes.edit', $recipe->id) }}" class="flex-1 text-center bg-amber-100 hover:bg-amber-200 text-amber-900 text-[11px] font-black uppercase py-1.5 rounded-xl border border-amber-300 transition">
                                        <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" class="inline" onsubmit="confirmDelete(event, 'Hapus Menu?', 'Yakin ingin menghapus menu \'{{ addslashes($recipe->title) }}\'?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 bg-rose-50 hover:bg-rose-100 text-rose-700 text-[11px] font-bold uppercase py-1.5 rounded-xl border border-rose-200 transition">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-16 px-4 bg-white rounded-3xl border-2 border-dashed border-[#d9c7b0]">
                    <div class="w-16 h-16 bg-[#faf5ee] text-amber-700 rounded-full flex items-center justify-center mx-auto mb-4 text-2xl border border-[#d9c7b0]">
                        <i class="fa-solid fa-utensils"></i>
                    </div>
                    <h3 class="text-xl font-bold font-serif text-[#29170e] mb-1">Menu Tidak Ditemukan</h3>
                    <p class="text-stone-500 text-sm max-w-md mx-auto mb-6">
                        Maaf, hidangan yang Anda cari belum tersedia di dapur kami. Coba kata kunci lain atau tulis menu baru Anda!
                    </p>
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('menu.index') }}" class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#ede3d4] text-[#431407] hover:bg-[#d9c7b0] transition">
                            Lihat Semua Menu
                        </a>
                        <a href="{{ route('recipes.create') }}" class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#431407] hover:bg-[#29170e] text-amber-200 transition shadow-sm">
                            + Tulis Menu Baru
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection
