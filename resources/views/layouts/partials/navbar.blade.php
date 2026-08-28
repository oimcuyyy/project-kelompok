<nav class="bg-[#1c120c] text-amber-100 border-b border-amber-950/80 sticky top-0 z-50 shadow-xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">

            <!-- Logo & Brand Resto -->
            <div class="flex items-center space-x-3">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group transition">
                    <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-700 flex items-center justify-center text-white shadow-lg shadow-orange-950/50 group-hover:scale-105 transition-transform border border-amber-400/30">
                        <i class="fa-solid fa-utensils text-xl"></i>
                    </div>
                    <div>
                        <div class="text-xl sm:text-2xl font-black font-serif tracking-tight text-white flex items-center gap-1.5">
                            <span>Dapur</span><span class="text-amber-400">Kuliner</span>
                        </div>
                        <div class="text-[10px] tracking-widest uppercase font-bold text-amber-300/80">
                            Rumah Menu Nusantara
                        </div>
                    </div>
                </a>
            </div>

            <!-- Desktop Menu Links -->
            <div class="hidden md:flex items-center space-x-7 font-bold text-xs uppercase tracking-wider text-amber-200/90">
                <a href="{{ route('home') }}" class="hover:text-amber-400 transition-colors {{ request()->routeIs('home') ? 'text-amber-400 font-extrabold border-b-2 border-amber-400 pb-1' : '' }}">
                    Beranda
                </a>
                <a href="{{ route('menu.index') }}" class="hover:text-amber-400 transition-colors {{ request()->routeIs('menu.index') ? 'text-amber-400 font-extrabold border-b-2 border-amber-400 pb-1' : '' }}">
                    Buku Menu & POS
                </a>
                <a href="{{ route('about') }}" class="hover:text-amber-400 transition-colors {{ request()->routeIs('about') ? 'text-amber-400 font-extrabold border-b-2 border-amber-400 pb-1' : '' }}">
                    Tentang Kami
                </a>
            </div>

            <!-- Search & Actions -->
            <div class="hidden sm:flex items-center space-x-3">
                <!-- Search Form -->
                <form action="{{ route('menu.index') }}" method="GET" class="relative">
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari hidangan masakan..."
                        class="bg-[#2a1b12] text-amber-100 placeholder-amber-400/50 rounded-full py-2.5 pl-4 pr-10 text-xs font-medium border border-amber-900/60 focus:border-amber-500 focus:outline-none focus:ring-2 focus:ring-amber-500/20 transition w-48 lg:w-64 shadow-inner"
                    >
                    <button type="submit" aria-label="Cari Menu" class="absolute right-3.5 top-2.5 text-amber-400/70 hover:text-amber-300 transition">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>

                @if(session('is_admin') || request()->cookie('is_admin_vercel') == 'true')
                    <!-- Tampil HANYA saat Mode Admin sudah aktif -->
                    <div class="flex items-center gap-2">
                        <button type="button" onclick="openAdminModal()" class="open-admin-modal-btn bg-amber-500/20 border border-amber-500 text-amber-300 px-3 py-2 rounded-full text-xs font-extrabold flex items-center gap-1.5 hover:bg-amber-500/30 transition">
                            <span>👑 Admin</span>
                        </button>
                        <a href="{{ route('recipes.create') }}" class="bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white text-xs uppercase tracking-wider font-extrabold px-4 py-2.5 rounded-full shadow-lg shadow-orange-950/60 hover:scale-105 transition-all flex items-center gap-1.5 border border-amber-300/30">
                            <i class="fa-solid fa-plus"></i>
                            <span>Tulis Menu</span>
                        </a>
                        <a href="{{ route('admin.logout') }}" title="Keluar Mode Admin" class="text-amber-400/70 hover:text-rose-400 p-2 rounded-full transition text-sm">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Mobile Hamburger Button -->
            <div class="flex items-center md:hidden gap-2">
                @if(session('is_admin') || request()->cookie('is_admin_vercel') == 'true')
                    <a href="{{ route('recipes.create') }}" class="bg-amber-600 text-white p-2 rounded-xl text-xs sm:hidden">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                @endif
                <button type="button" id="mobile-menu-btn" aria-label="Menu" class="text-amber-300 hover:text-white focus:outline-none p-2 rounded-xl border border-amber-900 bg-[#2a1b12]">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>

        </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobile-menu" class="hidden md:hidden flex-col border-t border-amber-900/80 bg-[#1c120c] px-6 py-5 space-y-4 shadow-2xl">
        <form action="{{ route('menu.index') }}" method="GET" class="relative">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari hidangan masakan..."
                class="w-full bg-[#2a1b12] text-amber-100 placeholder-amber-400/50 rounded-xl py-2.5 pl-4 pr-10 text-sm border border-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-500"
            >
            <button type="submit" class="absolute right-3.5 top-3 text-amber-400">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form>

        <div class="flex flex-col space-y-3 font-bold text-amber-200 text-xs uppercase tracking-wider">
            <a href="{{ route('home') }}" class="hover:text-amber-400 py-1">Beranda</a>
            <a href="{{ route('menu.index') }}" class="hover:text-amber-400 py-1">Buku Menu & POS</a>
            <a href="{{ route('about') }}" class="hover:text-amber-400 py-1">Tentang Kami</a>
        </div>

        @if(session('is_admin') || request()->cookie('is_admin_vercel') == 'true')
            <a href="{{ route('recipes.create') }}" class="block text-center bg-gradient-to-r from-amber-500 to-orange-600 text-white text-xs uppercase font-extrabold py-3 rounded-xl shadow transition tracking-wider">
                <i class="fa-solid fa-plus mr-1"></i> Tulis Menu Baru (Admin)
            </a>
            <a href="{{ route('admin.logout') }}" class="block text-center bg-[#2a170d] text-amber-300 text-xs font-bold py-2 rounded-xl border border-amber-900">
                Keluar Mode Admin
            </a>
        @endif
    </div>
</nav>
