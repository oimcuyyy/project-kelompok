<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $query = Recipe::query();

        if ($request->filled('search')) {
            $search = trim($request->search);
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('category') && $request->category !== 'Semua') {
            $query->where('category', $request->category);
        }

        // Apply pagination here
        $recipes = $query->latest()->paginate(12)->withQueryString();
        $categories = ['Semua', 'Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];

        return view('menu', compact('recipes', 'categories'));
    }

    public function create()
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat menambah resep.');
        }

        $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home')->with('error', 'Akses ditolak! Anda harus masuk sebagai Admin terlebih dahulu.');
        }

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'cooking_time' => 'required|numeric|min:1',
            'price'        => 'required|numeric|min:0',
            'image'        => 'required|url',
            'description'  => 'required|string|max:2000',
        ], [
            'title.required'        => 'Judul resep wajib diisi.',
            'category.required'     => 'Kategori resep wajib dipilih.',
            'cooking_time.required' => 'Waktu masak wajib diisi.',
            'cooking_time.min'      => 'Waktu masak minimal 1 menit.',
            'price.required'        => 'Harga wajib diisi.',
            'price.min'             => 'Harga tidak boleh negatif.',
            'image.required'        => 'URL gambar wajib diisi.',
            'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
            'description.required'  => 'Deskripsi resep wajib diisi.',
        ]);

        $recipe = Recipe::create($validated);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Menu berhasil ditambahkan oleh Admin!');
    }

    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);

        $relatedRecipes = Recipe::where('id', '!=', $id)
            ->where('category', $recipe->category)
            ->inRandomOrder()
            ->take(3)
            ->get();

        if ($relatedRecipes->isEmpty()) {
            $relatedRecipes = Recipe::where('id', '!=', $id)->inRandomOrder()->take(3)->get();
        }

        return view('show', compact('recipe', 'relatedRecipes'));
    }

    public function edit($id)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat mengedit resep.');
        }

        $recipe = Recipe::findOrFail($id);
        $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
        return view('edit', compact('recipe', 'categories'));
    }

    public function update(Request $request, $id)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->route('home')->with('error', 'Akses ditolak! Anda harus masuk sebagai Admin terlebih dahulu.');
        }

        $recipe = Recipe::findOrFail($id);

        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'required|string|max:100',
            'cooking_time' => 'required|numeric|min:1',
            'price'        => 'required|numeric|min:0',
            'image'        => 'required|url',
            'description'  => 'required|string|max:2000',
        ], [
            'title.required'        => 'Judul resep wajib diisi.',
            'category.required'     => 'Kategori resep wajib dipilih.',
            'cooking_time.required' => 'Waktu masak wajib diisi.',
            'cooking_time.min'      => 'Waktu masak minimal 1 menit.',
            'price.required'        => 'Harga wajib diisi.',
            'price.min'             => 'Harga tidak boleh negatif.',
            'image.required'        => 'URL gambar wajib diisi.',
            'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
            'description.required'  => 'Deskripsi resep wajib diisi.',
        ]);

        $recipe->update($validated);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Menu berhasil diperbarui oleh Admin!');
    }

    public function destroy($id)
    {
        if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
            return redirect()->back()->with('error', 'Akses ditolak! Hanya Admin yang dapat menghapus resep.');
        }

        $recipe = Recipe::findOrFail($id);
        $recipe->delete();

        return redirect()->route('home')->with('success', 'Menu berhasil dihapus oleh Admin.');
    }
}
