<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Beranda (Search & Filter)
Route::get('/', function (Request $request) {
    $query = Recipe::query();

    if ($request->filled('search')) {
        $search = trim($request->search);
        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
              ->orWhere('description', 'like', '%' . $search . '%')
              ->orWhere('ingredients', 'like', '%' . $search . '%');
        });
    }

    if ($request->filled('category') && $request->category !== 'Semua') {
        $query->where('category', $request->category);
    }

    $recipes = $query->latest()->get();
    $categories = ['Semua', 'Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
    $featuredRecipes = Recipe::inRandomOrder()->take(3)->get();

    return view('home', compact('recipes', 'categories', 'featuredRecipes'));
})->name('home');

// Form Tambah Resep Baru (Khusus Admin)
Route::get('/recipes/create', function () {
    if (!session('is_admin')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat menambah resep.');
    }

    $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
    return view('create', compact('categories'));
})->name('recipes.create');

// Simpan Resep Baru (Khusus Admin)
Route::post('/recipes', function (Request $request) {
    if (!session('is_admin')) {
        return redirect()->route('home')->with('error', 'Akses ditolak! Anda harus masuk sebagai Admin terlebih dahulu.');
    }

    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'category'     => 'required|string|max:100',
        'cooking_time' => 'required|integer|min:1|max:1440',
        'image'        => 'required|url',
        'description'  => 'required|string|max:2000',
        'ingredients'  => 'nullable|string',
        'steps'        => 'nullable|string',
    ], [
        'title.required'        => 'Judul resep wajib diisi.',
        'category.required'     => 'Kategori resep wajib dipilih.',
        'cooking_time.required' => 'Waktu memasak wajib diisi.',
        'cooking_time.min'      => 'Waktu memasak minimal 1 menit.',
        'image.required'        => 'URL gambar wajib diisi.',
        'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
        'description.required'  => 'Deskripsi resep wajib diisi.',
    ]);

    $recipe = Recipe::create($validated);

    return redirect()->route('recipes.show', $recipe->id)->with('success', 'Resep berhasil dipublikasikan oleh Admin!');
})->name('recipes.store');

// Form Edit Resep (Khusus Admin)
Route::get('/recipes/{id}/edit', function ($id) {
    if (!session('is_admin')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat mengedit resep.');
    }

    $recipe = Recipe::findOrFail($id);
    $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
    return view('edit', compact('recipe', 'categories'));
})->name('recipes.edit');

// Update Resep (Khusus Admin)
Route::put('/recipes/{id}', function (Request $request, $id) {
    if (!session('is_admin')) {
        return redirect()->route('home')->with('error', 'Akses ditolak! Anda harus masuk sebagai Admin terlebih dahulu.');
    }

    $recipe = Recipe::findOrFail($id);

    $validated = $request->validate([
        'title'        => 'required|string|max:255',
        'category'     => 'required|string|max:100',
        'cooking_time' => 'required|integer|min:1|max:1440',
        'image'        => 'required|url',
        'description'  => 'required|string|max:2000',
        'ingredients'  => 'nullable|string',
        'steps'        => 'nullable|string',
    ], [
        'title.required'        => 'Judul resep wajib diisi.',
        'category.required'     => 'Kategori resep wajib dipilih.',
        'cooking_time.required' => 'Waktu memasak wajib diisi.',
        'cooking_time.min'      => 'Waktu memasak minimal 1 menit.',
        'image.required'        => 'URL gambar wajib diisi.',
        'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
        'description.required'  => 'Deskripsi resep wajib diisi.',
    ]);

    $recipe->update($validated);

    return redirect()->route('recipes.show', $recipe->id)->with('success', 'Resep berhasil diperbarui oleh Admin!');
})->name('recipes.update');

// Hapus Resep (Khusus Admin)
Route::delete('/recipe/{id}', function ($id) {
    if (!session('is_admin')) {
        return redirect()->back()->with('error', 'Akses ditolak! Hanya Admin yang dapat menghapus resep.');
    }

    $recipe = Recipe::findOrFail($id);
    $recipe->delete();

    return redirect()->route('home')->with('success', 'Resep berhasil dihapus oleh Admin.');
})->name('recipes.destroy');

// Detail Resep
Route::get('/recipe/{id}', function ($id) {
    $recipe = Recipe::findOrFail($id);

    // Ambil rekomendasi resep terkait dengan kategori yang sama
    $relatedRecipes = Recipe::where('id', '!=', $id)
        ->where('category', $recipe->category)
        ->inRandomOrder()
        ->take(3)
        ->get();

    if ($relatedRecipes->isEmpty()) {
        $relatedRecipes = Recipe::where('id', '!=', $id)->inRandomOrder()->take(3)->get();
    }

    return view('show', compact('recipe', 'relatedRecipes'));
})->name('recipes.show');

// Auth Admin Routes
Route::get('/admin', function () {
    return redirect()->route('home', ['admin' => 1]);
});

Route::get('/admin/login', function () {
    return redirect()->route('home', ['admin' => 1]);
});

Route::post('/admin/login', function (Request $request) {
    $password = $request->input('password');

    // Default password admin
    if ($password === 'admin123' || $password === 'admin' || $password === '1234') {
        session(['is_admin' => true]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Berhasil masuk sebagai Admin!']);
        }

        return redirect()->route('home')->with('success', 'Selamat datang! Anda kini berada dalam Mode Admin.');
    }

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['success' => false, 'message' => 'Kata sandi admin salah!'], 422);
    }

    return redirect()->back()->with('error', 'Kata sandi admin salah! (Default: admin123)');
})->name('admin.login');

Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home')->with('success', 'Anda telah keluar dari Mode Admin.');
})->name('admin.logout');
