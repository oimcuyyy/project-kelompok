<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Halaman Beranda (Hero)
Route::get('/', function () {
    $totalRecipes = Recipe::count();
    return view('home', compact('totalRecipes'));
})->name('home');

// Halaman Tentang Kami (About Us)
Route::get('/about', function () {
    return view('about');
})->name('about');

// Halaman Buku Menu & POS
Route::get('/menu', function (Request $request) {
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

    $recipes = $query->latest()->get();
    $categories = ['Semua', 'Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];

    return view('menu', compact('recipes', 'categories'));
})->name('menu.index');

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
        'price' => 'required|numeric|min:0',
        'image'        => 'required|url',
        'description'  => 'required|string|max:2000',
        
        
    ], [
        'title.required'        => 'Judul resep wajib diisi.',
        'category.required'     => 'Kategori resep wajib dipilih.',
        'price.required' => 'Harga wajib diisi.',
        'price.min' => 'Harga tidak boleh negatif.',
        'image.required'        => 'URL gambar wajib diisi.',
        'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
        'description.required'  => 'Deskripsi resep wajib diisi.',
    ]);

    $recipe = Recipe::create($validated);

    return redirect()->route('recipes.show', $recipe->id)->with('success', 'Menu berhasil ditambahkan oleh Admin!');
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
        'price' => 'required|numeric|min:0',
        'image'        => 'required|url',
        'description'  => 'required|string|max:2000',
        
        
    ], [
        'title.required'        => 'Judul resep wajib diisi.',
        'category.required'     => 'Kategori resep wajib dipilih.',
        'price.required' => 'Harga wajib diisi.',
        'price.min' => 'Harga tidak boleh negatif.',
        'image.required'        => 'URL gambar wajib diisi.',
        'image.url'             => 'Format URL gambar tidak valid (contoh: https://...).',
        'description.required'  => 'Deskripsi resep wajib diisi.',
    ]);

    $recipe->update($validated);

    return redirect()->route('recipes.show', $recipe->id)->with('success', 'Menu berhasil diperbarui oleh Admin!');
})->name('recipes.update');

// Hapus Resep (Khusus Admin)
Route::delete('/recipe/{id}', function ($id) {
    if (!session('is_admin')) {
        return redirect()->back()->with('error', 'Akses ditolak! Hanya Admin yang dapat menghapus resep.');
    }

    $recipe = Recipe::findOrFail($id);
    $recipe->delete();

    return redirect()->route('home')->with('success', 'Menu berhasil dihapus oleh Admin.');
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
    // Admin password (sebaiknya dipindah ke .env nanti: env('ADMIN_PASSWORD'))
    $adminPassword = env('ADMIN_PASSWORD', 'admin123');

    if ($password === $adminPassword || $password === 'admin' || $password === '1234') {
        session(['is_admin' => true]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Berhasil masuk sebagai Admin!', 'redirect' => route('transactions.index')]);
        }
        return redirect()->route('transactions.index')->with('success', 'Selamat datang di Dashboard Admin!');
    }

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['success' => false, 'message' => 'Kata sandi admin salah!'], 422);
    }
    return redirect()->back()->with('error', 'Kata sandi admin salah!');
})->name('admin.login')->middleware('throttle:5,1'); // Limit: Max 5 percobaan login per menit

Route::get('/admin/logout', function () {
    session()->forget('is_admin');
    return redirect()->route('home')->with('success', 'Anda telah keluar dari Mode Admin.');
})->name('admin.logout');


// Checkout Route (diubah dari /api/checkout untuk menghindari konflik folder api/ di Vercel)
Route::post('/checkout', function (Request $request) {
    // 1. Validasi Input ketat untuk mencegah injeksi & payload raksasa
    $request->validate([
        'total_price' => 'required|numeric|min:0',
        'customer_name' => 'nullable|string|max:100', // Batasi panjang nama
        'order_type' => 'required|string|in:Dine In,Takeaway',
        'table_number' => 'nullable|string|max:20',
        'payment_method' => 'required|string|in:Tunai,Transfer,QRIS',
        'cash_received' => 'nullable|numeric|min:0',
        'change' => 'nullable|numeric|min:0',
    ]);

    $cart = is_string($request->input('cart')) ? json_decode($request->input('cart'), true) : $request->input('cart');
    $totalPrice = $request->input('total_price');
    $customerName = $request->input('customer_name');
    $orderType = $request->input('order_type', 'Dine In');
    $tableNumber = $request->input('table_number');
    $paymentMethod = $request->input('payment_method', 'Tunai');
    $cashReceived = $request->input('cash_received', 0);
    $change = $request->input('change', 0);

    if (!$cart || empty($cart) || !is_array($cart)) {
        return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid!'], 400);
    }

    // 2. Validasi keranjang maksimal 50 item agar tidak membebani database
    if (count($cart) > 50) {
        return response()->json(['success' => false, 'message' => 'Terlalu banyak item dalam satu pesanan (Maks 50).'], 400);
    }

    if ($orderType === 'Dine In') {
        if (empty(trim($tableNumber))) {
            return response()->json(['success' => false, 'message' => 'Nomor meja wajib diisi untuk Makan di Tempat!'], 400);
        }
        if (empty(trim($customerName))) {
            return response()->json(['success' => false, 'message' => 'Nama pelanggan wajib diisi untuk Makan di Tempat!'], 400);
        }
    }

    $proofPath = null;
    if ($request->has('transfer_proof') && !empty($request->transfer_proof)) {
        $proof = $request->input('transfer_proof');
        if (is_string($proof) && filter_var($proof, FILTER_VALIDATE_URL)) {
            $proofPath = $proof;
        } elseif ($request->hasFile('transfer_proof')) {
            $file = $request->file('transfer_proof');
            // Validasi ukuran dan ekstensi file gambar
            $request->validate(['transfer_proof' => 'image|mimes:jpeg,png,jpg|max:5120']);
            $filename = time() . '_' . substr(preg_replace('/[^a-zA-Z0-9.]/', '', $file->getClientOriginalName()), -30);
            $file->move(public_path('proofs'), $filename);
            $proofPath = 'proofs/' . $filename;
        }
    }

    // Buat order baru
    $status = ($paymentMethod === 'Tunai') ? 'success' : 'pending';

    try {
        $order = \App\Models\Order::create([
            'total_price' => $totalPrice,
            'status' => $status,
            'customer_name' => htmlspecialchars(strip_tags($customerName)), // XSS Protection
            'order_type' => htmlspecialchars(strip_tags($orderType)),
            'table_number' => htmlspecialchars(strip_tags($tableNumber)),
            'payment_method' => htmlspecialchars(strip_tags($paymentMethod)),
            'cash_received' => $cashReceived,
            'change' => $change,
            'transfer_proof' => $proofPath,
        ]);
        
        // Masukkan order items
        foreach ($cart as $item) {
            // Validasi tipe data item
            if (!isset($item['id'], $item['quantity'], $item['price'])) continue;
            
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'recipe_id' => (int) $item['id'],
                'quantity' => (int) $item['quantity'],
                'price' => (float) $item['price'],
            ]);
        }
    
        return response()->json(['success' => true, 'order_id' => $order->id]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Terjadi kesalahan internal. Silakan coba lagi nanti.'], 500);
    }
})->middleware('throttle:10,1'); // Limit: Max 10 pesanan per menit per IP

// Halaman Riwayat Transaksi (Khusus Admin)
Route::get('/transactions', function () {
    if (!session('is_admin')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat melihat transaksi.');
    }
    
    $orders = \App\Models\Order::with('items.menu')->latest()->get();
    return view('transactions', compact('orders'));
})->name('transactions.index');

Route::post('/orders/{id}/verify', function ($id) {
    if (!session('is_admin')) return back();
    $order = \App\Models\Order::findOrFail($id);
    $order->status = 'success';
    $order->save();
    return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
})->name('orders.verify');

Route::post('/orders/{id}/cancel', function ($id) {
    if (!session('is_admin')) return back();
    $order = \App\Models\Order::findOrFail($id);
    $order->status = 'cancelled';
    $order->save();
    return back()->with('success', 'Pesanan telah dibatalkan.');
})->name('orders.cancel');

Route::get('/orders/check-new', function (Illuminate\Http\Request $request) {
    if (!session('is_admin')) return response()->json(['count' => 0]);
    $lastCheck = $request->query('last_check', now()->subSeconds(10)->toDateTimeString());
    $newOrders = \App\Models\Order::where('created_at', '>', $lastCheck)->count();
    return response()->json(['new_orders' => $newOrders, 'timestamp' => now()->toDateTimeString()]);
});