@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-10">
    <div class="bg-white p-8 rounded-3xl shadow-sm border border-amber-100">
        <!-- Header Form -->
        <div class="mb-8 border-b border-slate-100 pb-4">
            <h1 class="text-2xl font-bold text-slate-800">Tulis Resep Baru 🍳</h1>
            <p class="text-slate-500 text-sm mt-1">Bagikan resep andalanmu kepada komunitas DapurKuliner!</p>
        </div>

        <form action="{{ route('recipes.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Judul Resep -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Judul Makanan</label>
                <input
                    type="text"
                    name="title"
                    required
                    placeholder="Contoh: Nasi Goreng Spesial Rempah"
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                >
            </div>

            <!-- Kategori & Waktu Memasak -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kategori</label>
                    <select
                        name="category"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                    >
                        <option value="">Pilih Kategori</option>
                        <option value="Nusantara">🇮🇩 Nusantara</option>
                        <option value="Western">🍕 Western</option>
                        <option value="Sehat">🥗 Sehat</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Waktu Memasak (Menit)</label>
                    <input
                        type="number"
                        name="cooking_time"
                        required
                        placeholder="30"
                        min="1"
                        class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                    >
                </div>
            </div>

            <!-- URL Gambar -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">URL Gambar Makanan</label>
                <input
                    type="url"
                    name="image"
                    required
                    placeholder="https://images.unsplash.com/..."
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                >
                <p class="text-xs text-slate-400 mt-1">Gunakan link gambar dari internet (Unsplash, Pexels, dll.)</p>
            </div>

            <!-- Deskripsi Resep -->
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Deskripsi Makanan</label>
                <textarea
                    name="description"
                    rows="4"
                    required
                    placeholder="Tuliskan deskripsi singkat mengenai cita rasa dan keunikan resep ini..."
                    class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-500 transition"
                ></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between items-center pt-4 border-t border-slate-100">
                <a href="{{ route('home') }}" class="text-slate-500 text-sm font-semibold hover:text-slate-700 hover:underline">
                    ← Batal
                </a>
                <button
                    type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold px-6 py-2.5 rounded-full shadow-md transition"
                >
                    Simpan Resep
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
