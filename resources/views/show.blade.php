@extends('layouts.app')

@section('title', $recipe->title . ' - Buku Resep | DapurKuliner')

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
            <a href="{{ route('home', ['category' => $recipe->category]) }}#resep" class="hover:text-amber-800 transition">
                {{ $recipe->category }}
            </a>
            <span class="text-stone-300">/</span>
            <span class="text-amber-800 truncate max-w-xs font-black">{{ $recipe->title }}</span>
        </nav>

        <a href="{{ route('home') }}#resep" class="text-xs font-bold uppercase tracking-wider text-[#431407] hover:text-amber-700 transition flex items-center gap-1.5 bg-white border border-[#d9c7b0] px-4 py-2 rounded-full shadow-xs">
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
                    <i class="fa-regular fa-clock text-amber-400"></i>
                    <span>{{ $recipe->cooking_time }} Menit Memasak</span>
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
                        <span>Resep Dapur Koki Autentik</span>
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
                        <span>Bagikan Resep</span>
                    </button>
                    <button
                        type="button"
                        onclick="window.print()"
                        class="bg-[#faf5ee] hover:bg-[#ede3d4] text-[#431407] text-xs font-bold uppercase tracking-wider px-4 py-2.5 rounded-full border border-[#d9c7b0] transition flex items-center gap-2 shadow-xs"
                    >
                        <i class="fa-solid fa-print text-amber-700"></i>
                        <span>Cetak Resep</span>
                    </button>
                </div>

                @if(session('is_admin'))
                    <div class="flex items-center gap-3">
                        <a href="{{ route('recipes.create') }}" class="text-xs font-black uppercase tracking-wider text-amber-800 hover:text-amber-950 flex items-center gap-1 bg-[#faf5ee] border border-[#d9c7b0] px-3.5 py-2 rounded-full shadow-xs">
                            <i class="fa-solid fa-plus text-amber-700"></i>
                            <span>+ Tulis Resep</span>
                        </a>
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus resep \'{{ addslashes($recipe->title) }}\' ini? Tindakan ini tidak dapat dibatalkan.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-xs font-bold uppercase tracking-wider text-rose-600 hover:text-rose-800 bg-rose-50 border border-rose-200 px-3.5 py-2 rounded-full transition flex items-center gap-1">
                                <i class="fa-solid fa-trash-can"></i>
                                <span>Hapus Menu</span>
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
                        {{ $recipe->description }}
                    </p>
                </div>
            </div>

            <!-- Two Column Layout: Ingredients & Steps -->
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                <!-- Left Column: Ingredients (5 cols) -->
                <div class="lg:col-span-5 space-y-6">
                    <div class="bg-[#faf5ee] p-6 rounded-3xl border border-[#e2d6c7] shadow-xs sticky top-24">
                        <div class="flex items-center justify-between pb-4 mb-4 border-b border-[#e2d6c7]">
                            <div>
                                <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Persiapan Dapur</span>
                                <h2 class="text-lg font-black font-serif text-[#29170e] flex items-center gap-2">
                                    <i class="fa-solid fa-basket-shopping text-amber-700"></i>
                                    <span>Bahan - Bahan</span>
                                </h2>
                            </div>
                            <span id="ingredients-progress-count" class="text-xs font-bold text-amber-900 bg-white border border-[#d9c7b0] px-3 py-1 rounded-full shadow-xs">
                                0 bahan
                            </span>
                        </div>

                        <p class="text-[11px] text-stone-500 mb-4">
                            <i class="fa-regular fa-circle-check text-amber-600 mr-1"></i> Centang bahan yang sudah disiapkan di meja masak.
                        </p>

                        <ul class="space-y-3 text-sm text-stone-800">
                            @if($recipe->ingredients)
                                @php
                                    $ingredients = array_filter(array_map('trim', explode("\n", $recipe->ingredients)));
                                @endphp
                                @forelse($ingredients as $index => $ingredient)
                                    <li class="ingredient-item flex items-start gap-3 p-2 rounded-xl hover:bg-white transition">
                                        <input
                                            type="checkbox"
                                            id="ing-{{ $index }}"
                                            class="ingredient-checkbox mt-0.5"
                                        >
                                        <label for="ing-{{ $index }}" class="flex-grow cursor-pointer text-xs sm:text-sm font-medium leading-normal text-stone-800">
                                            {{ $ingredient }}
                                        </label>
                                    </li>
                                @empty
                                    <li class="text-stone-400 text-xs italic">Bahan belum dicantumkan.</li>
                                @endforelse
                            @else
                                <li class="text-stone-400 text-xs italic">Bahan belum dicantumkan.</li>
                            @endif
                        </ul>
                    </div>
                </div>

                <!-- Right Column: Cooking Steps (7 cols) -->
                <div class="lg:col-span-7 space-y-6">
                    <div>
                        <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Petunjuk Koki</span>
                        <h2 class="text-lg sm:text-xl font-black font-serif text-[#29170e] flex items-center gap-2 mb-2">
                            <i class="fa-solid fa-kitchen-set text-amber-700"></i>
                            <span>Langkah - Langkah Memasak</span>
                        </h2>
                        <p class="text-xs text-stone-600 mb-6">Ikuti urutan langkah di bawah ini secara bertahap untuk menghasilkan rasa masakan yang sempurna.</p>
                    </div>

                    <div class="space-y-4">
                        @if($recipe->steps)
                            @php
                                $steps = array_filter(array_map('trim', explode("\n", $recipe->steps)));
                            @endphp
                            @forelse($steps as $index => $step)
                                <div class="step-card bg-[#faf5ee] p-5 rounded-2xl border border-[#e2d6c7] shadow-xs flex items-start gap-4">
                                    <div class="w-8 h-8 rounded-xl bg-[#431407] text-amber-300 font-black text-xs flex items-center justify-center shrink-0 shadow-md border border-amber-600/30">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="flex-grow">
                                        <h4 class="text-[10px] font-black text-amber-800 uppercase tracking-widest mb-1">Tahap {{ $index + 1 }}</h4>
                                        <p class="text-stone-800 text-xs sm:text-sm leading-relaxed font-medium">
                                            {{ $step }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <div class="p-6 bg-[#faf5ee] rounded-2xl text-stone-400 text-xs italic">
                                    Langkah memasak belum dicantumkan.
                                </div>
                            @endforelse
                        @else
                            <div class="p-6 bg-[#faf5ee] rounded-2xl text-stone-400 text-xs italic">
                                Langkah memasak belum dicantumkan.
                            </div>
                        @endif
                    </div>

                    <!-- Celebration Platter Box -->
                    <div class="mt-8 p-6 bg-gradient-to-r from-[#2a170d] via-[#431407] to-[#2a170d] rounded-3xl text-amber-100 shadow-md flex items-center justify-between border border-amber-600/40">
                        <div>
                            <h3 class="text-base font-black font-serif text-amber-300 mb-1">Hidangan Siap Disajikan! 🍲</h3>
                            <p class="text-xs text-amber-200/80">Sajikan selagi hangat untuk keluarga dan orang tersayang.</p>
                        </div>
                        <a href="{{ route('home') }}#resep" class="bg-amber-500 hover:bg-amber-600 text-[#180e08] font-black text-xs uppercase tracking-wider px-4 py-2.5 rounded-full transition shadow shrink-0">
                            Pilih Menu Lain
                        </a>
                    </div>
                </div>

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
                <a href="{{ route('home', ['category' => $recipe->category]) }}#resep" class="text-xs font-bold uppercase tracking-wider text-amber-800 hover:text-amber-950">
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
                                    ⏱️ {{ $related->cooking_time }} mnt
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
                                    {{ $related->description }}
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
