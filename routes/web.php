<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Beranda (Search & Filter)
Route::get('/', function (Request $request) {
    $query = Recipe::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('description', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $recipes = $query->latest()->get();

    return view('home', compact('recipes'));
})->name('home');

// Form Tambah Resep Baru
Route::get('/recipes/create', function () {
    return view('create');
})->name('recipes.create');

// Simpan Resep
Route::post('/recipes', function (Request $request) {
    $validated = $request->validate([
        'title'        => 'required|max:255',
        'category'     => 'required',
        'cooking_time' => 'required|numeric',
        'image'        => 'required|url',
        'description'  => 'required',
    ]);

    Recipe::create($validated);

    return redirect()->route('home')->with('success', 'Resep berhasil ditambahkan!');
})->name('recipes.store');

// Detail Resep
Route::get('/recipe/{id}', function ($id) {
    $recipe = Recipe::findOrFail($id);
    return view('show', compact('recipe'));
})->name('recipes.show');
