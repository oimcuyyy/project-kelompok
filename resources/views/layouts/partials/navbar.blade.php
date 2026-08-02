<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            <!-- Logo & Nama Web -->
            <div class="flex items-center space-x-3">
                <a href="{{ url('/') }}" class="flex items-center gap-2 text-2xl font-bold text-amber-600">
                    <i class="fa-solid fa-utensils text-3xl text-orange-500"></i>
                    <span>Dapur<span class="text-orange-500">Kuliner</span></span>
                </a>
            </div>

            <!-- Menu Utama -->
            <div class="hidden md:flex items-center space-x-8 font-medium text-slate-600">
                <a href="{{ url('/') }}" class="hover:text-orange-500 transition-colors">Beranda</a>
                <a href="#" class="hover:text-orange-500 transition-colors">Resep Populer</a>
                <a href="#" class="hover:text-orange-500 transition-colors">Kategori</a>
                <a href="#" class="hover:text-orange-500 transition-colors">Blog Kuliner</a>
                <a href="#" class="hover:text-orange-500 transition-colors">Tentang Kami</a>
            </div>

            <!-- Tombol Aksi / Pencarian -->
            <div class="flex items-center space-x-4">
                <form action="#" method="GET" class="relative hidden sm:block">
                    <input type="text" placeholder="Cari resep makanan..."
                        class="bg-slate-100 rounded-full py-2 pl-4 pr-10 text-sm focus:outline-none focus:ring-2 focus:ring-orange-400 w-48 lg:w-64">
                    <button type="submit" class="absolute right-3 top-2.5 text-slate-400 hover:text-orange-500">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-2.5 rounded-full font-medium shadow-sm transition-all flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    <span class="hidden sm:inline">Tulis Resep</span>
                </a>
            </div>

        </div>
    </div>
</nav>
