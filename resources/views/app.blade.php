<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DapurKuliner - Jelajah Rasa & Menu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#FFFDF7] text-slate-800 font-sans antialiased">

    <!-- Header / Navbar -->
    <header class="sticky top-0 z-50 bg-[#FFFDF7]/90 backdrop-blur-md border-b border-amber-100 shadow-sm">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-2 text-2xl font-black text-amber-600 hover:opacity-90 transition">
                <span>🍴</span>
                <span>Dapur<span class="text-slate-800">Kuliner</span></span>
            </a>

            <!-- Navigasi Menu (Sudah BISA DIKLIK) -->
            <nav class="hidden md:flex items-center space-x-8 text-slate-600 font-semibold text-sm">
                <a href="/" class="hover:text-amber-600 transition-colors py-1 border-b-2 border-transparent hover:border-amber-600">
                    Beranda
                </a>
                <a href="#menu-populer" class="hover:text-amber-600 transition-colors py-1 border-b-2 border-transparent hover:border-amber-600">
                    Menu Populer
                </a>
                <a href="#kategori" class="hover:text-amber-600 transition-colors py-1 border-b-2 border-transparent hover:border-amber-600">
                    Kategori
                </a>
                <a href="#blog" class="hover:text-amber-600 transition-colors py-1 border-b-2 border-transparent hover:border-amber-600">
                    Blog Kuliner
                </a>
                <a href="#tentang" class="hover:text-amber-600 transition-colors py-1 border-b-2 border-transparent hover:border-amber-600">
                    Tentang Kami
                </a>
            </nav>

            <!-- Search & Button -->
            <div class="flex items-center gap-4">
                <div class="relative hidden lg:block">
                    <input type="text" placeholder="Cari menu makanan..." class="bg-slate-100 text-sm rounded-full pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500 w-60">
                    <span class="absolute right-3 top-2.5 text-slate-400">🔍</span>
                </div>
                <a href="{{ route('recipes.create') }}" class="bg-amber-500 hover:bg-amber-600 text-white text-sm font-semibold px-4 py-2 rounded-full transition shadow-sm">
                        + Tulis Menu
            </a>
                </a>
            </div>

        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-6 py-8">
        @yield('content')
    </main>

</body>
</html>
