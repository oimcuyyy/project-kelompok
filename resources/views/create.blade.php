@extends('layouts.app')

@section('title', 'Tulis Menu Baru - DapurKuliner')

@section('content')
<div class="max-w-3xl mx-auto px-4 sm:px-6 py-12">
    <!-- Breadcrumb -->
    <div class="mb-6 flex items-center gap-2 text-xs font-bold uppercase tracking-wider text-stone-500">
        <a href="{{ route('transactions.index') }}" class="hover:text-amber-800 transition flex items-center gap-1">
            <i class="fa-solid fa-chart-line text-amber-700"></i>
            <span>Dashboard</span>
        </a>
        <span class="text-stone-300">/</span>
        <span class="text-amber-800">Tulis Menu Baru</span>
    </div>

    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-[#e8ded2]">
        <!-- Form Header -->
        <div class="mb-8 border-b border-[#e2d6c7] pb-6 flex items-center justify-between">
            <div>
                <span class="text-[10px] font-black text-amber-800 uppercase tracking-widest">Koleksi Dapur Koki</span>
                <h1 class="text-2xl sm:text-3xl font-black font-serif text-[#29170e] tracking-tight mt-1">Tulis Menu Baru 🍳</h1>
                <p class="text-stone-500 text-xs sm:text-sm mt-1">
                    Bagikan racikan menu andalan keluarga Anda agar bisa dinikmati oleh ribuan pecinta kuliner nusantara.
                </p>
            </div>
            <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] border border-[#d9c7b0] text-amber-800 flex items-center justify-center text-xl shrink-0 hidden sm:flex">
                <i class="fa-solid fa-pen-nib"></i>
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

        <form action="{{ route('recipes.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- 1. Judul Menu -->
            <div>
                <label for="title" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    Nama Hidangan / Judul Menu <span class="text-rose-500">*</span>
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    placeholder="Contoh: Rendang Daging Sapi Padang Asli"
                    class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                >
            </div>

            <!-- 2. Kategori & Harga (Rp) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <div>
                    <label for="category" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                        Kategori Menu <span class="text-rose-500">*</span>
                    </label>
                    <select
                        id="category"
                        name="category"
                        required
                        class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                    >
                        <option value="">Pilih Kategori Menu</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat }}" {{ old('category') == $cat ? 'selected' : '' }}>
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
                            value="{{ old('price', 30) }}"
                            required
                            min="1"
                            max="1440"
                            placeholder="30"
                            class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition pr-16"
                        >
                        <span class="absolute right-4 top-3.5 text-xs font-bold text-stone-400">Menit</span>
                    </div>
                </div>
            </div>

            <!-- 3. URL Gambar & Live Preview -->
            <div>
                <label for="image-input" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    URL Foto Hidangan Masakan <span class="text-rose-500">*</span>
                </label>
                <input
                    type="url"
                    id="image-input"
                    name="image"
                    value="{{ old('image') }}"
                    required
                    placeholder="https://images.unsplash.com/photo-..."
                    class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                >
                <p class="text-[11px] text-stone-500 mt-1.5 flex items-center gap-1">
                    <i class="fa-solid fa-circle-info text-amber-700"></i>
                    Gunakan tautan gambar online (contoh dari Unsplash, Pexels, atau link foto makanan).
                </p>

                <!-- Pratinjau Foto -->
                <div class="mt-3">
                    <div class="image-preview-wrapper h-48 w-full rounded-2xl">
                        <img id="image-preview" src="" alt="Pratinjau Foto" class="w-full h-full object-cover hidden">
                        <div id="preview-placeholder" class="text-stone-400 text-xs font-medium text-center p-4">
                            <i class="fa-solid fa-image text-2xl block mb-1 text-stone-300"></i>
                            <span>Pratinjau foto hidangan akan otomatis muncul di sini setelah URL diisi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Deskripsi Menu -->
            <div>
                <label for="description" class="block text-xs font-black uppercase tracking-wider text-stone-700 mb-2">
                    Cerita / Deskripsi Singkat Menu <span class="text-rose-500">*</span>
                </label>
                <textarea
                    id="description"
                    name="description"
                    rows="3"
                    required
                    placeholder="Ceritakan keistimewaan bumbu, tekstur rasa, atau tips penyajian hidangan ini..."
                    class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition"
                >{{ old('description') }}</textarea>
            </div>

            <!-- 5. Bahan-Bahan -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="ingredients" class="block text-xs font-black uppercase tracking-wider text-stone-700">
                        Daftar Takaran Bahan - Bahan
                    </label>
                    <span class="text-[10px] text-stone-400 font-bold uppercase">1 baris = 1 bahan</span>
                </div>
                <textarea
                    id="ingredients"
                    name="ingredients"
                    rows="5"
                    placeholder="Contoh:&#10;500 gram Daging Sapi Paha&#10;1000 ml Santan Kental Kelapa Tua&#10;4 batang Serai (memarkan)&#10;6 lembar Daun Jeruk Purut"
                    class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition font-mono text-xs leading-relaxed"
                >{{ old('ingredients') }}</textarea>
                <p class="text-[11px] text-stone-500 mt-1">Tekan Enter untuk memisahkan setiap bahan.</p>
            </div>

            <!-- 6. Langkah Memasak -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <label for="steps" class="block text-xs font-black uppercase tracking-wider text-stone-700">
                        Urutan Langkah - Langkah Memasak
                    </label>
                    <span class="text-[10px] text-stone-400 font-bold uppercase">1 baris = 1 langkah</span>
                </div>
                <textarea
                    id="steps"
                    name="steps"
                    rows="6"
                    placeholder="Contoh:&#10;Haluskan bumbu rempah hingga benar-benar lembut.&#10;Tumis bumbu halus bersama daun jeruk dan serai hingga matang harum.&#10;Masukkan potongan daging sapi dan santan, masak dengan api kecil hingga kuah menyusut."
                    class="w-full bg-[#faf5ee] border border-[#d9c7b0] focus:bg-white rounded-2xl px-4 py-3 text-sm text-stone-900 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:border-amber-500 transition font-mono text-xs leading-relaxed"
                >{{ old('steps') }}</textarea>
                <p class="text-[11px] text-stone-500 mt-1">Tekan Enter untuk memisahkan setiap nomor langkah memasak.</p>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-[#e2d6c7] gap-4">
                <a href="{{ route('home') }}" class="text-xs font-black uppercase tracking-wider text-stone-500 hover:text-stone-900 transition flex items-center gap-1.5">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Batal & Kembali</span>
                </a>
                <button
                    type="submit"
                    class="bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white font-black text-xs uppercase tracking-widest px-8 py-3.5 rounded-full shadow-lg shadow-orange-950/40 hover:scale-105 transition-all flex items-center gap-2 border border-amber-300/30"
                >
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>Publikasikan Menu</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
