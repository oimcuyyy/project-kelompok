@extends('layouts.app')

@section('title', 'DapurKuliner - Rumah Menu & Hidangan Autentik')

@section('content')
    <!-- 1. Hero Section Ala Rumah Makan / Bistro Autentik -->
    <section class="relative text-white py-16 sm:py-24 px-4 sm:px-6 shadow-2xl border-b border-amber-900/60" style="background: linear-gradient(145deg, #180e08 0%, #2d180d 45%, #431407 80%, #2a1106 100%);">
        
        <!-- Ambient Glow & Pattern -->
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_20%,rgba(245,158,11,0.18),transparent_70%)] pointer-events-none"></div>

        <div class="max-w-5xl mx-auto text-center relative z-10">
            <!-- Restaurant Seal Badge -->
            <div class="inline-flex items-center gap-2 bg-[#2a170d] border border-amber-500/40 px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-widest text-amber-300 shadow-md mb-6">
                <span>🏮 RUMAH MENU & CITA RASA NUSANTARA</span>
            </div>

            <!-- Title -->
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-black font-serif tracking-tight leading-tight mb-5 text-[#fff8f0] drop-shadow-md">
                Selamat Datang di DapurKuliner <br class="hidden sm:inline">
                <span class="text-amber-400 italic">Harmoni Rasa dalam Setiap Sajian</span>
            </h1>

            <p class="text-sm sm:text-lg text-amber-100/90 max-w-2xl mx-auto mb-10 leading-relaxed font-medium">
                Rasakan pengalaman bersantap yang tak terlupakan dengan hidangan khas Nusantara dan Mancanegara, diracik dari bahan-bahan segar pilihan dan resep turun-temurun.
            </p>

            <!-- Search Form Resto -->
            <div class="max-w-2xl mx-auto mb-8">
                <form action="{{ route('menu.index') }}" method="GET" class="flex flex-col sm:flex-row gap-2.5 bg-[#26140b] p-2.5 rounded-2xl sm:rounded-full shadow-2xl border border-amber-500/40">
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
                    <a href="{{ route('menu.index', ['search' => 'Rendang']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Rendang Padang</a>
                    <a href="{{ route('menu.index', ['search' => 'Ayam']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Olahan Ayam</a>
                    <a href="{{ route('menu.index', ['search' => 'Bakso']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Bakso Tetelan</a>
                    <a href="{{ route('menu.index', ['search' => 'Pizza']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Pizza & Pasta</a>
                    <a href="{{ route('menu.index', ['search' => 'Dimsum']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Dimsum Siomay</a>
                    <a href="{{ route('menu.index', ['search' => 'Kopi']) }}" class="bg-[#2d180d] hover:bg-[#3d2012] text-amber-100 hover:text-amber-300 px-3.5 py-1 rounded-full border border-amber-700/50 transition shadow-sm">Kopi Gula Aren</a>
                </div>
            </div>

            <!-- Stats Bar Resto -->
            <div class="grid grid-cols-3 max-w-lg mx-auto pt-8 border-t border-amber-800/40 text-center gap-4">
                <div>
                    <div class="text-2xl sm:text-3xl font-black font-serif text-amber-400">{{ $totalRecipes }}</div>
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

@endsection
