@extends('layouts.app')

@section('title', $recipe->title . ' - Buku Menu | DapurKuliner')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    <!-- Breadcrumb & Back Button -->
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <nav class="flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-500">
            <a href="{{ route('home') }}" class="hover:text-amber-800 transition flex items-center gap-1">
                <i class="fa-solid fa-house text-amber-700"></i>
                <span>Beranda</span>
            </a>
            <span class="text-stone-300">/</span>
            <a href="{{ route('home', ['category' => $recipe->category]) }}#menu" class="hover:text-amber-800 transition">
                {{ $recipe->category }}
            </a>
            <span class="text-stone-300">/</span>
            <span class="text-amber-800 truncate max-w-xs font-black">{{ $recipe->title }}</span>
        </nav>

        <a href="{{ route('home') }}#menu" class="text-xs font-bold uppercase tracking-wider text-[#431407] hover:text-amber-700 transition flex items-center gap-1.5 bg-white border border-[#d9c7b0] px-4 py-2 rounded-full shadow-xs">
            <i class="fa-solid fa-arrow-left text-[10px]"></i>
            <span>Kembali ke Buku Menu</span>
        </a>
    </div>

    <!-- Success Message Notification -->
    @if(session('success'))
        <div class="mb-8 p-4 bg-amber-100/90 border border-amber-400 text-amber-950 rounded-2xl font-bold flex items-center gap-3 shadow-sm">
            <span class="text-2xl">🎉</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <!-- Main Recipe Sheet Card Container -->
    <article class="bg-white rounded-3xl shadow-md border border-[#e8ded2] overflow-hidden mb-16">
        
        <!-- Recipe Hero Banner Image -->
        <div class="relative h-80 sm:h-96 lg:h-[460px] w-full overflow-hidden bg-stone-100">
            <img
                src="{{ $recipe->image }}"
                alt="{{ $recipe->title }}"
                class="w-full h-full object-cover"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-[#180e08] via-[#180e08]/40 to-transparent"></div>

            <!-- Top Floating Badges -->
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
            <div class="absolute top-5 left-5 flex flex-wrap gap-2.5 z-10">
                <span class="{{ $badgeClass }} text-xs font-black uppercase tracking-wider px-4 py-1.5 rounded-full shadow-lg">
                    {{ $recipe->category }}
                </span>
                <span class="bg-[#1c120c]/90 backdrop-blur-md text-amber-300 text-xs font-bold px-4 py-1.5 rounded-full shadow-lg flex items-center gap-1.5 border border-amber-500/30">
                    <i class="fa-solid fa-tag text-amber-400"></i>
                    <span>{{ $recipe->price }} </span>
                </span>
            </div>

            <!-- Bottom Floating Title Overlay -->
            <div class="absolute bottom-6 left-6 right-6 z-10 text-white">
                <h1 class="text-2xl sm:text-4xl lg:text-5xl font-black font-serif tracking-tight leading-tight mb-3 drop-shadow-lg text-[#fff8f0]">
                    {{ $recipe->title }}
                </h1>
                <div class="flex flex-wrap items-center gap-4 text-xs font-medium text-amber-200/90">
                    <span class="flex items-center gap-1.5">
                        <i class="fa-solid fa-utensils text-amber-400"></i>
                        <span>Menu Dapur Koki Autentik</span>
                    </span>
                    <span>•</span>
                    <span class="flex items-center gap-1.5">
                        <i class="fa-regular fa-calendar text-amber-400"></i>
                        <span>{{ $recipe->created_at ? $recipe->created_at->translatedFormat('d M Y') : 'Koleksi Spesial' }}</span>
                    </span>
                </div>
            </div>
        </div>

        <!-- Recipe Sheet Details -->
        <div class="p-6 sm:p-10 bg-white">

            <!-- Action Bar (Share, Print, Add) -->
            <div class="flex flex-wrap items-center justify-between gap-4 pb-7 border-b border-[#f0e8dc]">
                <div class="flex items-center gap-2.5">
                    <button
                        type="button"
                        id="share-recipe-btn"
                        class="bg-[#faf5ee] hover:bg-[#ede3d4] text-[#431407] text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-full border border-[#d9c7b0] transition flex items-center gap-2 shadow-xs"
                    >
                        <i class="fa-solid fa-share-nodes text-amber-700"></i>
                        <span>Bagikan Menu</span>
                    </button>
                    <button
                        type="button"
                        onclick="window.print()"
                        class="bg-[#faf5ee] hover:bg-[#ede3d4] text-[#431407] text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-full border border-[#d9c7b0] transition flex items-center gap-2 shadow-xs"
                    >
                        <i class="fa-solid fa-print text-amber-700"></i>
                        <span>Cetak Menu</span>
                    </button>
                </div>

                @if(session('is_admin'))
                    <div class="flex items-center gap-2.5">
                        <a href="{{ route('recipes.create') }}" class="text-xs font-black uppercase tracking-wider text-amber-800 hover:text-amber-950 flex items-center gap-1 bg-[#faf5ee] border border-[#d9c7b0] px-3.5 py-2 rounded-full shadow-xs">
                            <i class="fa-solid fa-plus text-amber-700"></i>
                            <span>+ Tulis Menu</span>
                        </a>
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="text-xs font-black uppercase tracking-wider text-amber-900 hover:text-amber-950 flex items-center gap-1 bg-amber-100 hover:bg-amber-200 border border-amber-300 px-3.5 py-2 rounded-full shadow-xs transition">
                            <i class="fa-solid fa-pen-to-square text-amber-800"></i>
                            <span>Edit Menu</span>
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="confirmDelete(event, 'Hapus Menu?', 'Apakah Anda yakin ingin menghapus menu \'{{ addslashes($recipe->title) }}\' ini? Tindakan ini tidak dapat dibatalkan.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold uppercase tracking-wider text-rose-600 hover:text-rose-800 bg-rose-50 hover:bg-rose-100 border border-rose-200 px-3.5 py-2 rounded-full transition flex items-center gap-1">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Hapus</span>
                            </button>
                        </form>
                    </div>
                @endif
            </div>

            <!-- Description Box -->
            <div class="my-8 bg-[#faf5ee] p-6 rounded-2xl border border-[#e2d6c7]">
                <div class="flex items-start gap-3.5">
                    <i class="fa-solid fa-quote-left text-amber-600 text-2xl mt-0.5 shrink-0"></i>
                    <p class="text-stone-700 text-sm sm:text-base leading-relaxed font-medium">
                        {!! nl2br(e($recipe->description)) !!}
                    </p>
                </div>
            </div>

                        <div class="my-8 text-center bg-amber-50 p-8 rounded-2xl border border-amber-200">
                <h3 class="text-2xl font-bold font-serif text-[#29170e] mb-2">Harga: Rp {{ number_format($recipe->price, 0, ',', '.') }}</h3>
                <p class="text-stone-600 mb-6">Pesan sekarang dan nikmati hidangan spesial kami.</p>
                <button 
    @click="addToCart({ id: {{ $recipe->id }}, title: '{{ addslashes($recipe->title) }}', price: {{ $recipe->price }}, image: '{{ $recipe->image }}' })"
    class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold px-8 py-4 rounded-full text-lg shadow-lg flex items-center gap-2 mx-auto transition transform hover:scale-105"
>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>Tambah ke Keranjang</span>
                </button>
            </div>
        </div>
    </article>

    <!-- Related Recipes Section -->
    @if(isset($relatedRecipes) && $relatedRecipes->count() > 0)
        <section class="mt-14">
            <div class="flex items-center justify-between mb-6 border-b border-[#e2d6c7] pb-4">
                <div>
                    <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Rekomendasi Chef</span>
                    <h3 class="text-xl sm:text-2xl font-black font-serif text-[#29170e] tracking-tight">Hidangan Serupa yang Wajib Dicoba</h3>
                </div>
                <a href="{{ route('home', ['category' => $recipe->category]) }}#menu" class="text-xs font-bold uppercase tracking-wider text-amber-800 hover:text-amber-950">
                    Lihat Semua {{ $recipe->category }} ➔
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedRecipes as $related)
                    @php
                        $badgeClass = match($related->category) {
                            'Nusantara' => 'badge-nusantara',
                            'Western' => 'badge-western',
                            'Asia' => 'badge-asia',
                            'Sehat' => 'badge-sehat',
                            'Kue & Dessert' => 'badge-dessert',
                            'Minuman' => 'badge-minuman',
                            default => 'badge-default'
                        };
                    @endphp
                    <a href="{{ route('recipes.show', $related->id) }}" class="block group">
                        <div class="resto-card bg-white rounded-2xl overflow-hidden shadow-xs hover:shadow-md transition h-full flex flex-col border border-[#e8ded2]">
                            <div class="relative h-44 overflow-hidden bg-stone-100">
                                <img
                                    src="{{ $related->image }}"
                                    alt="{{ $related->title }}"
                                    class="resto-card-img w-full h-full object-cover group-hover:scale-108 transition duration-300"
                                >
                                <span class="absolute top-3 right-3 bg-[#1c120c]/90 text-amber-300 text-[10px] font-bold px-2.5 py-1 rounded-full">
                                    💰 Rp {{ number_format($related->price, 0, ',', '.') }}
                                </span>
                                <span class="absolute bottom-3 left-3 {{ $badgeClass }} text-[10px] font-black uppercase tracking-wider px-2.5 py-0.5 rounded-full">
                                    {{ $related->category }}
                                </span>
                            </div>
                            <div class="p-4 flex flex-col flex-grow justify-between bg-white">
                                <h4 class="text-sm font-bold font-serif text-[#29170e] group-hover:text-amber-700 transition line-clamp-1">
                                    {{ $related->title }}
                                </h4>
                                <p class="text-stone-500 text-xs mt-1 line-clamp-2">
                                    {!! nl2br(e($related->description)) !!}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

</div>
@endsection
