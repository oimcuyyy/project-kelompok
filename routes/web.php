<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CheckoutController;



Route::get('/ping-db', function () {
    try {
        $result = DB::select('SELECT 1');
        return response()->json(['status' => 'ok', 'db' => 'connected', 'data' => $result]);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
});

// Home & About
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');

// Menu & Recipes
Route::get('/menu', [RecipeController::class, 'index'])->name('menu.index');
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->name('recipes.edit');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->name('recipes.update');
Route::delete('/recipe/{id}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
Route::get('/recipe/{id}', [RecipeController::class, 'show'])->name('recipes.show');

// Admin Auth & Maintenance
Route::get('/admin', function () { return redirect()->route('home', ['admin' => 1]); });
Route::get('/admin/login', function () { return redirect()->route('home', ['admin' => 1]); });
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/admin/maintenance', [AdminController::class, 'maintenance'])->name('admin.maintenance.index');
Route::post('/admin/maintenance', [AdminController::class, 'toggleMaintenance'])->name('admin.maintenance.toggle');

// Transactions & Orders
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/admin/transactions/export', [TransactionController::class, 'export'])->name('admin.transactions.export');
Route::post('/orders/{id}/verify', [TransactionController::class, 'verify'])->name('orders.verify');
Route::post('/orders/{id}/cancel', [TransactionController::class, 'cancel'])->name('orders.cancel');
Route::get('/orders/check-new', [TransactionController::class, 'checkNew']);

// Checkout (Local & Midtrans)
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/midtrans-checkout', [CheckoutController::class, 'process']);
Route::post('/midtrans-callback', [CheckoutController::class, 'callback']);
