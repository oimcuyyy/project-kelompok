@extends('layouts.app')

@section('title', 'DapurKuliner - Rumah Resep & Hidangan Autentik')

@section('content')
    <!-- 1. Hero Section Ala Rumah Makan / Bistro Autentik -->
    <section class="relative text-white py-16 sm:py-24 px-4 sm:px-6 shadow-2xl border-b border-amber-900/60" style="background: linear-gradient(145deg, #180e08 0%, #2d180d 45%, #431407 80%, #2a1106 100%);">
        
        <!-- Ambient Glow & Pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_20%,rgba(245,158,11,0.18),transparent_70%)] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto text-center relative z-10">
            <!-- Restaurant Seal Badge -->
            <div class="inline-flex items-center gap-2 bg-[#2a170d] border border-amber-500/40 px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest text-amber-300 shadow-md mb-6">
                <span>🏮 RUMAH RESEP & CITA RASA NUSANTARA</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-serif tracking-tight leading-tight mb-5 text-[#fff8f0] drop-shadow-md">
                Hidangan Lezat & Resep Pilihan <br class="hidden sm:inline">
                <span class="text-amber-400 italic">Cita Rasa Istimewa Keluarga</span>
            </h1>

            <p class="text-sm sm:text-lg text-amber-100/90 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                Temukan rahasia olahan bumbu autentik khas nusantara dan mancanegara dengan panduan langkah memasak yang praktis, lezat, dan teruji.
            </p>

            <!-- Search Form Resto -->
            <div class="max-w-2xl mx-auto mb-8">
                <form action="{{ route('home') }}" method="GET" class="flex flex-col sm:flex-row gap-2.5 bg-[#26140b] p-2.5 rounded-2xl sm:rounded-full shadow-2xl border border-amber-500/40">
                    <div class="flex items-center flex-grow pl-4 py-1.5 text-amber-100">
                        <i class="fa-solid fa-magnifying-glass text-amber-400 mr-3 text-lg"></i>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Cari hidangan masakan (Rendang, Ayam, Soto, Bakso, Pasta)..."
                            class="w-full bg-transparent text-amber-50 text-sm focus:outline-none placeholder-amber-300/50 font-medium"
                        >
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold text-xs uppercase tracking-wider px-8 py-3.5 rounded-xl sm:rounded-full transition shadow-lg shadow-orange-950/50 flex items-center justify-center gap-2 shrink-0 border border-amber-300/30 hover:scale-105">
                        <span>Cari Menu</span>
                        <i class="fa-solid fa-utensils text-xs"></i>
                    </button>
                </form>

                <!-- Quick Recommendation Tags -->
                <div class="flex flex-wrap items-center justify-center gap-2 mt-5 text-xs font-semibold text-amber-200">
                    <span class="text-amber-400 font-bold"><i class="fa-solid fa-fire text-amber-400 mr-1"></i>Menu Populer:</span>
                    <a href="{{ route('home', ['search' => 'Rendang']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Rendang Padang</a>
                    <a href="{{ route('home', ['search' => 'Ayam']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Olahan Ayam</a>
                    <a href="{{ route('home', ['search' => 'Bakso']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Bakso Tetelan</a>
                    <a href="{{ route('home', ['search' => 'Pizza']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Pizza & Pasta</a>
                    <a href="{{ route('home', ['search' => 'Dimsum']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Dimsum Siomay</a>
                    <a href="{{ route('home', ['search' => 'Kopi']) }}#resep" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Kopi Gula Aren</a>
                </div>
            </div>

            <!-- Stats Bar Resto -->
            <div class="grid grid-cols-3 max-w-lg mx-auto pt-8 border-t border-amber-800/40 text-center gap-4">
                <div>
                    <div class="text-2xl sm:text-3xl font-black font-serif text-amber-400">{{ $recipes->count() }}</div>
                    <div class="text-[11px] uppercase tracking-wider text-amber-200/80 font-bold mt-1">Hidangan Pilihan</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-black font-serif text-amber-400">100%</div>
                    <div class="text-[11px] uppercase tracking-wider text-amber-200/80 font-bold mt-1">Bumbu Teruji</div>
                </div>
                <div>
                    <div class="text-2xl sm:text-3xl font-black font-serif text-amber-400">6</div>
                    <div class="text-[11px] uppercase tracking-wider text-amber-200/80 font-bold mt-1">Kategori Spesial</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Section Buku Menu & Kategori Hidangan -->
    <section id="resep" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">

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
                        Daftar Menu Hidangan Spesial
                    </h2>
                </div>
                <div class="text-xs font-bold text-stone-500 bg-[#ede3d4] px-4 py-2 rounded-full">
                    Tersedia <span class="text-amber-700 font-extrabold text-sm">{{ $recipes->count() }}</span> resep hidangan
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
                        $catUrl = $cat == 'Semua' ? route('home') : route('home', ['category' => $cat]);
                    @endphp
                    <a href="{{ $catUrl }}#resep"
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
                <a href="{{ route('home') }}#resep" class="text-xs font-bold uppercase tracking-wider text-amber-800 hover:text-amber-950 bg-white border border-[#d9c7b0] px-4 py-2 rounded-full hover:bg-amber-50 transition shadow-sm flex items-center gap-1.5 shrink-0">
                    <i class="fa-solid fa-rotate-left"></i>
                    <span>Tampilkan Semua Menu</span>
                </a>
            </div>
        @endif

        <!-- 3. List Card Resep Dinamis (Menu Platters) -->
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
                                <i class="fa-regular fa-clock text-amber-400"></i>
                                <span>{{ $recipe->cooking_time }} Menit</span>
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
                                    {{ $recipe->description }}
                                </p>
                            </div>

                            <!-- Card Footer Action -->
                            <div class="mt-6 pt-4 border-t border-[#f0e8dc] flex items-center justify-between text-xs font-bold text-stone-600">
                                <span class="text-amber-700 group-hover:text-amber-900 group-hover:translate-x-1 transition-all inline-flex items-center gap-1.5 uppercase tracking-wider text-[11px]">
                                    <span>Buka Resep & Bahan</span>
                                    <i class="fa-solid fa-arrow-right text-[11px]"></i>
                                </span>
                                <span class="text-stone-400 font-medium text-[11px]">
                                    <i class="fa-solid fa-fire text-amber-600 mr-1"></i> Teruji
                                </span>
                            </div>
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
                        Maaf, hidangan yang Anda cari belum tersedia di dapur kami. Coba kata kunci lain atau tulis resep baru Anda!
                    </p>
                    <div class="flex justify-center gap-3">
                        <a href="{{ route('home') }}" class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#ede3d4] text-[#431407] hover:bg-[#d9c7b0] transition">
                            Lihat Semua Menu
                        </a>
                        <a href="{{ route('recipes.create') }}" class="px-5 py-2.5 rounded-full text-xs font-bold uppercase tracking-wider bg-[#431407] hover:bg-[#29170e] text-amber-200 transition shadow-sm">
                            + Tulis Resep Baru
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <!-- 4. Section Rahasia Dapur Koki (Resto Secret Tips) -->
    <section id="tips" class="bg-[#ede3d4] py-16 border-t border-[#d9c7b0] mt-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <div class="inline-flex items-center gap-1.5 text-xs font-black text-amber-800 uppercase tracking-widest mb-2">
                    <i class="fa-solid fa-kitchen-set"></i> RAHASIA DAPUR KOKI
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-serif text-[#29170e] tracking-tight">Kunci Kelezatan Masakan Resto</h2>
                <p class="text-stone-600 text-sm mt-2">Tips dan trik autentik dari dapur untuk menghasilkan cita rasa masakan yang konsisten dan kaya bumbu.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Tip 1 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        🍲
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Kuah Kaldu Jernih & Gurih Alami</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Rebus tulang dan daging dengan api paling kecil (simmering perlahan) dan buang busa buih kotoran pada 15 menit pertama agar kaldu tetap bening dan manis alami.
                    </p>
                </div>

                <!-- Tip 2 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-emerald-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        🥬
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Sayuran Tetap Renyah & Hijau Segar</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Rebus sayuran dalam air mendidih bergaram selama 1-2 menit, lalu langsung celupkan ke dalam air es batu (metode blanching) untuk mengunci warna hijau segar.
                    </p>
                </div>

                <!-- Tip 3 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        🥩
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Daging Empuk & Bumbu Meresap</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Setelah digoreng atau dipanggang, biarkan daging beristirahat (resting) selama 5-7 menit sebelum dipotong agar sari rasa (jus) daging terkunci sempurna dan tidak kering.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
