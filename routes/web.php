<?php

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Temporary route to migrate and seed the database on Vercel
Route::get('/admin/setup-db', function () {
    try {
        $conn = DB::connection()->getDriverName();
        $dbName = DB::connection()->getDatabaseName();
        Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
        return 'Database successfully migrated and seeded to SUPABASE! <br> Driver used: ' . $conn . '<br> Database Name: ' . $dbName . '<br><a href="/">Go to Home</a>';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
});
use Illuminate\Support\Facades\DB;

Route::get('/ping-db', function () {
    try {
        $result = DB::select('SELECT 1');
        return response()->json(['status' => 'ok', 'db' => 'connected', 'data' => $result]);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
});


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
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat menambah resep.');
    }

    $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
    return view('create', compact('categories'));
})->name('recipes.create');

// Simpan Resep Baru (Khusus Admin)
Route::post('/recipes', function (Request $request) {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
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
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat mengedit resep.');
    }

    $recipe = Recipe::findOrFail($id);
    $categories = ['Nusantara', 'Western', 'Asia', 'Sehat', 'Kue & Dessert', 'Minuman'];
    return view('edit', compact('recipe', 'categories'));
})->name('recipes.edit');

// Update Resep (Khusus Admin)
Route::put('/recipes/{id}', function (Request $request, $id) {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
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
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
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

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $key = 'login_attempts_' . $request->ip();

    if (\Illuminate\Support\Facades\RateLimiter::tooManyAttempts($key, 3)) {
        $seconds = \Illuminate\Support\Facades\RateLimiter::availableIn($key);
        $message = "Terlalu banyak percobaan. Coba lagi dalam {$seconds} detik.";
        
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => false, 'message' => $message], 429);
        }
        return redirect()->back()->with('error', $message);
    }

    $email = $request->input('email');
    $password = $request->input('password');

    if ($email === 'belajarmandiri03034@gmail.com' && $password === 'oimaja25') {
        \Illuminate\Support\Facades\RateLimiter::clear($key);
        session(['is_admin' => true]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Berhasil masuk sebagai Admin!', 'redirect' => route('transactions.index')])->cookie('is_admin_vercel', 'true', 10080);
        }
        return redirect()->route('transactions.index')->cookie('is_admin_vercel', 'true', 10080)->with('success', 'Selamat datang di Dashboard Admin!');
    }

    \Illuminate\Support\Facades\RateLimiter::hit($key, 60);

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json(['success' => false, 'message' => 'Email atau kata sandi admin salah!'], 401);
    }
    return redirect()->back()->with('error', 'Email atau kata sandi admin salah!');
})->name('admin.login');

Route::get('/admin/force-login', function () {
    session(['is_admin' => true]);
    return redirect()->route('transactions.index')->cookie('is_admin_vercel', 'true', 10080)->with('success', 'Berhasil masuk melalui jalur khusus!');
});

Route::get('/admin/logout', function () {
    session()->flush();
    $cookie = cookie('is_admin_vercel', 'false', -1);
    return redirect()->route('home')->with('success', 'Anda telah keluar dari Mode Admin.')->withCookie($cookie);
})->name('admin.logout');


// Checkout Route (diubah dari /api/checkout untuk menghindari konflik folder api/ di Vercel)
Route::post('/checkout', function (Request $request) {
    // 0. Anti-Spam Berbasis Session (Tidak bisa ditembus oleh curl/bot tanpa session state)
    $lastOrderTime = session('last_order_time');
    if ($lastOrderTime && now()->diffInSeconds($lastOrderTime) < 15) {
        return response()->json(['success' => false, 'message' => 'Anda memesan terlalu cepat. Silakan tunggu 15 detik.'], 429);
    }

    // 1. Validasi Input ketat untuk mencegah injeksi & payload raksasa
    $request->validate([
        'customer_name' => 'nullable|string|max:100', // Batasi panjang nama
        'order_type' => 'required|string|in:Dine In,Takeaway',
        'table_number' => 'nullable|string|max:20',
        'payment_method' => 'required|string|in:Tunai,Transfer,QRIS',
    ]);

    try {

    // 0.5 Limit Pesanan Gantung (Maksimal 2 per sesi)
    $pendingOrders = session('pending_orders', []);
    if (!empty($pendingOrders)) {
        $pendingOrders = \App\Models\Order::whereIn('id', $pendingOrders)
            ->whereIn('status', ['pending', 'unpaid'])
            ->pluck('id')
            ->toArray();
        session(['pending_orders' => $pendingOrders]);
    }
    
    if (count($pendingOrders) >= 2) {
        return response()->json(['success' => false, 'message' => 'Anda memiliki 2 pesanan yang belum dibayar. Harap selesaikan pembayaran sebelumnya atau hubungi kasir.'], 400);
    }

    $cart = is_string($request->input('cart')) ? json_decode($request->input('cart'), true) : $request->input('cart');
    $customerName = $request->input('customer_name');
    $orderType = $request->input('order_type', 'Dine In');
    $tableNumber = $request->input('table_number');
    $paymentMethod = $request->input('payment_method', 'Tunai');
    $cashReceived = $request->input('cash_received', 0);

    if (!$cart || empty($cart) || !is_array($cart)) {
        return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid!'], 400);
    }

    // 2. Validasi keranjang maksimal 50 item agar tidak membebani database
    if (count($cart) > 50) {
        return response()->json(['success' => false, 'message' => 'Terlalu banyak item dalam satu pesanan (Maks 50).'], 400);
    }

    // === VALIDASI PAYLOAD & HARGA DARI DATABASE ===
    $calculatedTotalPrice = 0;
    $validCart = [];
    foreach ($cart as $item) {
        if (!isset($item['id'], $item['quantity'])) continue;
        
        $recipe = \App\Models\Recipe::find($item['id']);
        if (!$recipe) {
            return response()->json(['success' => false, 'message' => 'Terdapat menu yang tidak valid/tidak ditemukan dalam keranjang.'], 400);
        }
        
        $qty = (int) $item['quantity'];
        if ($qty <= 0) continue;
        
        $price = $recipe->price;
        $calculatedTotalPrice += ($price * $qty);
        
        $validCart[] = [
            'id' => $recipe->id,
            'quantity' => $qty,
            'price' => $price
        ];
    }
    
    if (empty($validCart)) {
        return response()->json(['success' => false, 'message' => 'Keranjang kosong atau tidak valid!'], 400);
    }

    // Hitung kembalian secara backend (jika Tunai)
    $change = 0;
    if ($paymentMethod === 'Tunai') {
        if ($cashReceived < $calculatedTotalPrice) {
            return response()->json(['success' => false, 'message' => 'Uang tunai kurang dari total tagihan!'], 400);
        }
        $change = $cashReceived - $calculatedTotalPrice;
    }

    if ($orderType === 'Dine In') {
        if (empty(trim($tableNumber))) {
            return response()->json(['success' => false, 'message' => 'Nomor meja wajib diisi untuk Makan di Tempat!'], 400);
        }
        if (empty(trim($customerName))) {
            return response()->json(['success' => false, 'message' => 'Nama pelanggan wajib diisi untuk Makan di Tempat!'], 400);
        }

        // Blokir Meja Sibuk: Cek apakah ada pesanan pending/unpaid di meja yang sama
        $isTableBusy = \App\Models\Order::where('table_number', trim($tableNumber))
            ->where('order_type', 'Dine In')
            ->whereIn('status', ['pending', 'unpaid'])
            ->exists();

        if ($isTableBusy) {
            return response()->json(['success' => false, 'message' => "Meja nomor {$tableNumber} sedang sibuk (masih ada pesanan pending/belum lunas)."], 400);
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


        session(['last_order_time' => now()]);

        $order = \App\Models\Order::create([
            'total_price' => $calculatedTotalPrice, // Gunakan harga hasil kalkulasi backend
            'status' => $status,
            'customer_name' => htmlspecialchars(strip_tags($customerName)), // XSS Protection
            'order_type' => htmlspecialchars(strip_tags($orderType)),
            'table_number' => htmlspecialchars(strip_tags($tableNumber)),
            'payment_method' => htmlspecialchars(strip_tags($paymentMethod)),
            'cash_received' => $paymentMethod === 'Tunai' ? $cashReceived : 0,
            'change' => $change,
            'transfer_proof' => $proofPath,
        ]);
        
        // Simpan ke sesi pesanan gantung
        if (in_array($status, ['pending', 'unpaid'])) {
            $pendingOrders[] = $order->id;
            session(['pending_orders' => $pendingOrders]);
        }

        // Masukkan order items
        foreach ($validCart as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'recipe_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
    
        return response()->json(['success' => true, 'order_id' => $order->id]);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Internal Error: ' . $e->getMessage() . ' at line ' . $e->getLine()], 500);
    }
});

// Halaman Riwayat Transaksi (Khusus Admin)
Route::get('/transactions', function () {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) {
        return redirect()->route('home', ['admin' => 1])->with('error', 'Akses terbatas! Hanya Admin yang dapat melihat transaksi.');
    }
    
    $orders = \App\Models\Order::with('items.menu')->latest()->get();
    return view('transactions', compact('orders'));
})->name('transactions.index');

Route::post('/orders/{id}/verify', function ($id) {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return back();
    $order = \App\Models\Order::findOrFail($id);
    $order->status = 'success';
    $order->save();
    return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
})->name('orders.verify');

Route::post('/orders/{id}/cancel', function ($id) {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return back();
    $order = \App\Models\Order::findOrFail($id);
    $order->status = 'cancelled';
    $order->save();
    return back()->with('success', 'Pesanan telah dibatalkan.');
})->name('orders.cancel');

Route::get('/orders/check-new', function (Illuminate\Http\Request $request) {
    if ((!session('is_admin') && request()->cookie('is_admin_vercel') !== 'true')) return response()->json(['count' => 0]);
    $lastCheck = $request->query('last_check', now()->subSeconds(10)->toDateTimeString());
    $newOrders = \App\Models\Order::where('created_at', '>', $lastCheck)->count();
    return response()->json(['new_orders' => $newOrders, 'timestamp' => now()->toDateTimeString()]);
});