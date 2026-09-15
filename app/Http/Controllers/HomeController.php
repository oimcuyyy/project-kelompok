<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        $totalRecipes = Recipe::count();
        return view('home', compact('totalRecipes'));
    }

    public function about()
    {
        return view('about');
    }
}
