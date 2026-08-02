@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-sm border border-amber-100 overflow-hidden my-6">
    <!-- Gambar Utama & Badge -->
    <div class="relative h-80 w-full overflow-hidden">
        <img src="{{ $recipe->image }}" alt="{{ $recipe->title }}" class="w-full h-full object-cover">
        <div class="absolute top-4 left-4 flex gap-2">
            <span class="bg-amber-500 text-white text-xs font-bold px-3 py-1.5 rounded-full shadow-md">
                {{ $recipe->category }}
            </span>
            <span class="bg-white/90 backdrop-blur-md text-slate-700 text-xs font-bold px-3 py-1.5 rounded-full shadow-md flex items-center gap-1">
                ⏱️ {{ $recipe->cooking_time }} Menit
            </span>
        </div>
    </div>

    <!-- Konten Informasi Resep -->
    <div class="p-8">
        <h1 class="text-3xl font-extrabold text-slate-800 mb-4">{{ $recipe->title }}</h1>
        <p class="text-slate-600 text-lg leading-relaxed mb-8 border-b border-amber-100 pb-6">
            {{ $recipe->description }}
        </p>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Bahan-bahan Dinamis -->
            <div class="bg-amber-50/50 p-6 rounded-2xl border border-amber-100">
                <h3 class="text-xl font-bold text-amber-900 mb-4 flex items-center gap-2">
                    <span>🥗</span> Bahan - Bahan
                </h3>
                <ul class="space-y-3 text-slate-700">
                    @if($recipe->ingredients)
                        @foreach(explode("\n", $recipe->ingredients) as $ingredient)
                            @if(trim($ingredient) != '')
                                <li class="flex items-center gap-3">
                                    <input type="checkbox" class="accent-amber-500 w-4 h-4 rounded">
                                    <span>{{ trim($ingredient) }}</span>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <li class="text-slate-400 text-sm">Bahan belum dimasukkan.</li>
                    @endif
                </ul>
            </div>

            <!-- Langkah Pembuatan Dinamis -->
            <div>
                <h3 class="text-xl font-bold text-slate-800 mb-4 flex items-center gap-2">
                    <span>🍳</span> Langkah Memasak
                </h3>
                <ol class="space-y-4 text-slate-700">
                    @if($recipe->steps)
                        @foreach(explode("\n", $recipe->steps) as $index => $step)
                            @if(trim($step) != '')
                                <li class="flex gap-4">
                                    <span class="bg-amber-500 text-white font-bold w-6 h-6 rounded-full flex items-center justify-center shrink-0 text-sm">
                                        {{ $index + 1 }}
                                    </span>
                                    <span>{{ trim($step) }}</span>
                                </li>
                            @endif
                        @endforeach
                    @else
                        <li class="text-slate-400 text-sm">Langkah pembuatan belum dimasukkan.</li>
                    @endif
                </ol>
            </div>
        </div>

        <!-- Tombol Kembali -->
        <div class="mt-8 pt-6 border-t border-slate-100 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-amber-600 font-semibold hover:underline flex items-center gap-1">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
