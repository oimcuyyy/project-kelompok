<footer class="bg-[#1c120c] text-amber-100/80 pt-16 pb-10 mt-20 border-t border-amber-950/80 shadow-2xl">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

            <!-- Branding & Restaurant Intro -->
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-gradient-to-br from-amber-500 to-orange-700 flex items-center justify-center text-white shadow-md border border-amber-400/30">
                        <i class="fa-solid fa-utensils text-lg"></i>
                    </div>
                    <div>
                        <span class="text-2xl font-black font-serif text-white tracking-tight">Dapur<span class="text-amber-400">Kuliner</span></span>
                        <div class="text-[9px] uppercase tracking-widest text-amber-400/80 font-bold">Rumah Menu Autentik</div>
                    </div>
                </a>
                <p class="text-xs text-amber-200/70 leading-relaxed">
                    Menghidangkan ribuan inspirasi menu masakan nusantara dan mancanegara dengan racikan bumbu khas dapur keluarga Indonesia.
                </p>
                <div class="flex space-x-3 text-sm pt-2">
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram" class="w-9 h-9 rounded-xl bg-[#2a1b12] border border-amber-900/60 flex items-center justify-center text-amber-300 hover:bg-amber-600 hover:text-white transition-all">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" aria-label="YouTube" class="w-9 h-9 rounded-xl bg-[#2a1b12] border border-amber-900/60 flex items-center justify-center text-amber-300 hover:bg-amber-600 hover:text-white transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="https://tiktok.com" target="_blank" rel="noopener noreferrer" aria-label="TikTok" class="w-9 h-9 rounded-xl bg-[#2a1b12] border border-amber-900/60 flex items-center justify-center text-amber-300 hover:bg-amber-600 hover:text-white transition-all">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            <!-- Kategori Populer -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-amber-400 mb-4 border-l-2 border-amber-500 pl-3">
                    Buku Menu Pilihan
                </h4>
                <ul class="space-y-2.5 text-xs text-amber-200/70">
                    <li>
                        <a href="{{ route('home', ['category' => 'Nusantara']) }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Hidangan Nusantara
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home', ['category' => 'Western']) }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Masakan Western
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home', ['category' => 'Asia']) }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Masakan Asia & Oriental
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home', ['category' => 'Sehat']) }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Sajian Diet & Sehat
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home', ['category' => 'Kue & Dessert']) }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Kue Tradisional & Manisan
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Navigasi Resto -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-amber-400 mb-4 border-l-2 border-amber-500 pl-3">
                    Navigasi Cepat
                </h4>
                <ul class="space-y-2.5 text-xs text-amber-200/70">
                    <li>
                        <a href="{{ route('home') }}" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Beranda Utama
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('recipes.create') }}" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Tulis Menu Baru
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#menu" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Daftar Semua Hidangan
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('home') }}#tips" class="hover:text-amber-300 transition-colors flex items-center gap-2">
                            <span class="text-amber-500">›</span> Rahasia Dapur Koki
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Jam Buka Dapur & Kutipan -->
            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-amber-400 mb-4 border-l-2 border-amber-500 pl-3">
                    Inspirasi Masak Harian
                </h4>
                <div class="bg-[#2a1b12] p-4 rounded-2xl border border-amber-900/60 space-y-2">
                    <div class="text-xs font-bold text-amber-200 flex items-center gap-1.5">
                        <i class="fa-solid fa-clock text-amber-400"></i>
                        <span>Buka Setiap Hari 24 Jam</span>
                    </div>
                    <p class="text-[11px] text-amber-300/70 leading-relaxed">
                        "Masakan yang dibuat dengan cinta dan rempah pilihan selalu membawa kehangatan di meja makan."
                    </p>
                </div>
            </div>

        </div>

        <!-- Copyright Bottom -->
        <div class="border-t border-amber-950/80 pt-8 flex flex-col sm:flex-row items-center justify-between text-xs text-amber-400/50 gap-4">
            <div>
                &copy; {{ date('Y') }} <span class="text-amber-300 font-bold">DapurKuliner</span>. Dibuat dengan <i class="fa-solid fa-heart text-rose-500"></i> untuk pecinta kuliner.
                <button type="button" onclick="openAdminModal()" class="ml-2 hover:text-amber-300 transition-colors opacity-60 hover:opacity-100" title="Login Admin">
                    <i class="fa-solid fa-lock text-[10px]"></i>
                </button>
            </div>
            <div class="flex space-x-4 text-amber-400/60 font-semibold uppercase tracking-wider text-[10px]">
                <span>Autentik</span>
                <span>•</span>
                <span>Tradisional</span>
                <span>•</span>
                <span>Lezat</span>
            </div>
        </div>
    </div>
</footer>
