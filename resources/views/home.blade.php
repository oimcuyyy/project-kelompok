@extends('layouts.app')

@section('content')
    <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-amber-500 to-orange-600 text-white py-12 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold mb-3">Temukan Resep Makanan Favoritmu</h1>
            <p class="text-base md:text-lg text-amber-100 max-w-2xl mx-auto mb-6">
                Jelajahi ribuan resep olahan rumahan, jajanan tradisional, hingga sajian spesial untuk keluarga.
            </p>
            <a href="#resep" class="bg-white text-orange-600 font-bold px-6 py-2.5 rounded-full hover:bg-amber-100 transition-colors inline-block shadow-md">
                Mulai Jelajah
            </a>
        </div>
    </section>

    <!-- Main Content Section -->
    <section id="resep" class="max-w-7xl mx-auto px-4 py-12">

        <!-- Notifikasi Sukses Tambah Resep -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-emerald-100 border border-emerald-300 text-emerald-800 rounded-2xl font-semibold flex items-center gap-3 shadow-sm">
                <span class="text-xl">🎉</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Judul & Chip Filter Kategori -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4 border-b border-slate-100 pb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-800 border-l-4 border-orange-500 pl-3">Resep Spesial Hari Ini</h2>
                <p class="text-slate-500 text-sm mt-1">Pilih kategori atau gunakan pencarian di atas</p>
            </div>

            <!-- Filter Kategori -->
            <div class="flex flex-wrap gap-2">
                <a href="{{ route('home') }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition {{ !request('category') && !request('search') ? 'bg-amber-500 text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    Semua
                </a>
                <a href="{{ route('home', ['category' => 'Sehat']) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition {{ request('category') == 'Sehat' ? 'bg-amber-500 text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    🥗 Sehat
                </a>
                <a href="{{ route('home', ['category' => 'Nusantara']) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition {{ request('category') == 'Nusantara' ? 'bg-amber-500 text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    🇮🇩 Nusantara
                </a>
                <a href="{{ route('home', ['category' => 'Western']) }}"
                   class="px-4 py-1.5 rounded-full text-xs font-bold transition {{ request('category') == 'Western' ? 'bg-amber-500 text-white shadow-md' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                    🍕 Western
                </a>
            </div>
        </div>

        <!-- Banner Pencarian Aktif -->
        @if(request('search'))
            <div class="mb-6 p-4 bg-amber-50 border border-amber-200 text-amber-900 rounded-xl flex justify-between items-center text-sm">
                <span>Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong></span>
                <a href="{{ route('home') }}" class="text-amber-600 font-bold hover:underline">Reset Filter</a>
            </div>
        @endif

        <!-- List Card Resep Dinamis -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($recipes as $recipe)
                <a href="{{ route('recipes.show', $recipe->id) }}" class="block group">
                    <div class="bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-slate-100 h-full flex flex-col">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            <span class="absolute top-3 right-3 bg-white/90 backdrop-blur-md text-slate-700 text-xs font-bold px-2.5 py-1 rounded-full shadow">
                                ⏱️ {{ $recipe->cooking_time }} mnt
                            </span>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <span class="inline-block bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded-full w-max mb-2">
                                {{ $recipe->category }}
                            </span>
                            <h3 class="text-lg font-bold text-slate-800 group-hover:text-amber-600 transition">
                                {{ $recipe->title }}
                            </h3>
                            <p class="text-slate-600 text-sm mt-1 line-clamp-2 flex-grow">
                                {{ $recipe->description }}
                            </p>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-12 bg-white rounded-2xl border border-dashed border-slate-200">
                    <p class="text-slate-400 text-lg">Belum ada resep yang ditemukan 🙁</p>
                    <a href="{{ route('home') }}" class="mt-2 inline-block text-amber-600 font-bold hover:underline">Lihat Semua Resep</a>
                </div>
            @endforelse
        </div>
    </section>
@endsection
