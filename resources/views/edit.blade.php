@extends('layouts.app')

@section('title', 'Edit Menu: ' . $recipe->title . ' - DapurKuliner')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-12">
    <!-- Breadcrumb -->
    <div class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-500">
        <a href="{{ route('transactions.index') }}" class="hover:text-amber-800 transition flex items-center gap-1">
            <i class="fa-solid fa-chart-line text-amber-700"></i>
            <span>Dashboard</span>
        </a>
        <span class="text-stone-300">/</span>
        <a href="{{ route('recipes.show', $recipe->id) }}" class="hover:text-amber-800 transition">
            {{ $recipe->title }}
        </a>
        <span class="text-stone-300">/</span>
        <span class="text-amber-800">Edit Menu</span>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-[#e8ded2]">
        <!-- Form Header -->
        <div class="mb-8 border-b border-[#e2d6c7] pb-6 flex items-center justify-between">
            <div>
                <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Mode Kelola Admin</span>
                <h1 class="text-2xl sm:text-3xl font-black font-serif text-[#29170e] tracking-tight mt-1">Edit Menu Hidangan ✏️</h1>
                <p class="text-stone-500 text-xs sm:text-sm mt-1">
                    Perbarui bahan, langkah memasak, atau informasi sajian hidangan ini.
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] border border-[#d9c7b0] text-amber-800 flex items-center justify-center text-xl shrink-0 hidden sm:flex">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>
        </div>

        <!-- Validation Errors Display -->
        @if ($errors->any())
            <div class="mb-8 p-4 bg-rose-50 border border-rose-300 rounded-2xl text-rose-800 text-sm">
                <div class="flex items-center gap-2 font-bold mb-2">
                    <i class="fa-solid fa-circle-exclamation text-rose-500"></i>
                    <span>Terdapat beberapa kesalahan pengisian formulir:</span>
                </div>
                <ul class="list-disc list-inside space-y-1 text-xs text-rose-700">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- 1. Judul Menu -->
            <div>
                <label for="title" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    Nama Hidangan / Judul Menu <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $recipe->title) }}"
                    required
                    placeholder="Contoh: Rendang Sapi Khas Minang"
                    class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-medium transition"
                >
            </div>

            <!-- 2. Kategori & Harga (Rp) (Grid 2 Kolom) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="category" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                        Kategori Menu <span class="text-rose-500">*</span>
                    </label>
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-medium transition"
                    >
                        <option value="" disabled>Pilih Kategori</option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category', $recipe->category) == $cat ? 'selected' : '' }}>
                                {{ $cat }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="price" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                        Waktu Masak (Menit) <span class="text-rose-500">*</span>
                    </label>
                    <div class="relative">
                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price', $recipe->price) }}"
                            min="1"
                            max="1440"
                            required
                            placeholder="Contoh: 45"
                            class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-medium transition pr-16"
                        >
                        <span class="absolute right-4 top-3 text-xs text-stone-400 font-bold pointer-events-none">Menit</span>
                    </div>
                </div>
            </div>

            <!-- 3. URL Gambar -->
            <div>
                <label for="image" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    URL Foto Hidangan <span class="text-rose-500">*</span>
                </label>
                <input
                    type="url"
                    id="image"
                    name="image"
                    value="{{ old('image', $recipe->image) }}"
                    required
                    placeholder="https://images.unsplash.com/..."
                    class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-medium transition"
                >
            </div>

            <!-- 4. Deskripsi -->
            <div>
                <label for="description" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    Deskripsi Ringkas & Cerita Menu <span class="text-rose-500">*</span>
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    required
                    placeholder="Ceritakan keistimewaan rasa, bumbu rahasia, atau sejarah menu ini..."
                    class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-medium transition"
                >{{ old('description', $recipe->description) }}</textarea>
            </div>

            <!-- 5. Bahan-bahan -->
            <div>
                <label for="ingredients" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-1">
                    Daftar Bahan-Bahan
                </label>
                <p class="text-stone-400 text-xs mb-2">Tuliskan satu bahan per baris (tekan Enter untuk baris baru).</p>
                <textarea
                    id="ingredients"
                    name="ingredients"
                    rows="6"
                    placeholder="500 gram daging sapi gandik&#10;4 butir kelapa tua, peras santan kental&#10;10 siung bawang merah&#10;5 siung bawang putih&#10;2 lembar daun kunyit"
                    class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-mono transition"
                >{{ old('ingredients', $recipe->ingredients) }}</textarea>
            </div>

            <!-- 6. Langkah Memasak -->
            <div>
                <label for="steps" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-1">
                    Langkah-Langkah Memasak
                </label>
                <p class="text-stone-400 text-xs mb-2">Tuliskan satu tahap per baris (tekan Enter untuk baris baru).</p>
                <textarea
                    id="steps"
                    name="steps"
                    rows="6"
                    placeholder="Haluskan bumbu halus lalu tumis hingga harum.&#10;Masukkan daging sapi, aduk rata hingga berubah warna.&#10;Tuang santan perlahan sambil diaduk rata di atas api sedang.&#10;Masak perlahan hingga kuah mengering dan berminyak hitam kecokelatan."
                    class="w-full px-4 py-3 rounded-2xl border border-[#d9c7b0] bg-[#faf5ee]/50 focus:bg-white focus:outline-none focus:ring-2 focus:ring-amber-500 text-stone-800 text-sm font-mono transition"
                >{{ old('steps', $recipe->steps) }}</textarea>
            </div>

            <!-- Action Buttons -->
            <div class="pt-6 border-t border-[#e2d6c7] flex flex-col sm:flex-row items-center justify-end gap-3">
                <a href="{{ route('recipes.show', $recipe->id) }}" class="w-full sm:w-auto px-6 py-3 rounded-full border border-stone-300 text-stone-600 hover:bg-stone-50 font-bold text-xs uppercase tracking-wider text-center transition">
                    Batal
                </a>
                <button
                    type="submit"
                    class="w-full sm:w-auto bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold text-xs uppercase tracking-wider px-8 py-3.5 rounded-full shadow-lg shadow-orange-950/40 hover:scale-105 transition flex items-center justify-center gap-2 border border-amber-300/30"
                >
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span>Simpan Perubahan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
