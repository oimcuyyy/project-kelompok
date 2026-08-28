<!-- Admin Authentication & Management Modal (Ctrl + Shift + L) -->
<div id="admin-modal" class="fixed inset-0 z-[9999] {{ request()->has('admin') ? 'flex' : 'hidden' }} items-center justify-center p-4 bg-black/80 backdrop-blur-md transition-all duration-300">
    <div class="relative w-full max-w-md bg-[#1c120c] border border-amber-600/60 rounded-3xl p-6 sm:p-8 shadow-2xl text-amber-100 transform transition-all {{ request()->has('admin') ? 'scale-100 opacity-100' : 'scale-95 opacity-0' }}" id="admin-modal-box">
        
        <!-- Close Button -->
        <button type="button" id="close-admin-modal-btn" onclick="closeAdminModal()" class="absolute top-4 right-4 text-amber-400/60 hover:text-amber-300 p-2 text-sm rounded-full transition">
            ✕
        </button>

        @if(session('is_admin') || request()->cookie('is_admin_vercel') == 'true')
            <!-- If Already Logged In as Admin -->
            <div class="text-center space-y-4">
                <div class="w-16 h-16 rounded-3xl bg-amber-500/20 border border-amber-500 text-amber-400 flex items-center justify-center mx-auto text-3xl shadow-lg">
                    👑
                </div>
                <div>
                    <span class="inline-block bg-amber-500/30 text-amber-300 text-[10px] font-black uppercase tracking-widest px-3 py-1 rounded-full border border-amber-500/40 mb-2">
                        Status: Terotentikasi
                    </span>
                    <h3 class="text-xl sm:text-2xl font-black font-serif text-white">Mode Admin Aktif</h3>
                    <p class="text-xs text-amber-200/70 mt-1">
                        Anda memiliki hak penuh untuk menambah, mengedit, dan menghapus menu hidangan menu.
                    </p>
                </div>

                <div class="pt-4 space-y-2.5">
                    <a href="{{ route('transactions.index') }}" class="block w-full py-3 rounded-full bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg transition text-center border border-amber-400/30">
                        <i class="fa-solid fa-chart-line mr-1.5"></i> Dashboard Admin
                    </a>
                    <a href="{{ route('recipes.create') }}" class="block w-full py-2.5 rounded-full bg-[#3d2012] hover:bg-[#4d2816] text-amber-100 text-xs font-bold uppercase tracking-wider transition text-center border border-amber-900/60">
                        <i class="fa-solid fa-plus mr-1.5"></i> Tulis Menu Baru
                    </a>
                    <a href="{{ route('admin.logout') }}" class="block w-full py-2.5 rounded-full bg-[#2a170d] hover:bg-[#3d2012] text-amber-300 text-xs font-bold uppercase tracking-wider transition text-center border border-amber-900/60">
                        <i class="fa-solid fa-right-from-bracket mr-1.5"></i> Keluar Mode Admin
                    </a>
                </div>
            </div>
        @else
            <!-- If Not Logged In -->
            <div class="space-y-4">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-amber-500/20 border border-amber-500/50 text-amber-400 flex items-center justify-center text-2xl shrink-0">
                        🔐
                    </div>
                    <div>
                        <span class="text-[10px] font-black text-amber-400 uppercase tracking-widest">Akses Khusus</span>
                        <h3 class="text-lg sm:text-xl font-black font-serif text-white">Login Mode Admin</h3>
                    </div>
                </div>

                <p class="text-xs text-amber-200/70 leading-relaxed">
                    Fitur menambah dan mengelola menu dibatasi khusus untuk Administrator / Koki dapur.
                </p>

                <!-- Login Form -->
                <form id="admin-login-form" action="{{ route('admin.login') }}" method="POST" class="space-y-4 pt-2">
                    @csrf
                    <div>
                        <label for="admin-email" class="block text-[11px] font-extrabold uppercase tracking-wider text-amber-300 mb-1.5">
                            Email Admin
                        </label>
                        <div class="relative">
                            <input
                                type="email"
                                id="admin-email"
                                name="email"
                                required
                                autofocus
                                placeholder="contoh@gmail.com"
                                class="w-full bg-[#2a170d] border border-amber-900 focus:border-amber-500 rounded-2xl py-3 pl-4 pr-10 text-sm text-amber-100 placeholder-amber-400/40 focus:outline-none focus:ring-2 focus:ring-amber-500/30 transition"
                            >
                            <span class="absolute right-3.5 top-3.5 text-amber-400/60 text-sm">
                                <i class="fa-solid fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div>
                        <label for="admin-password" class="block text-[11px] font-extrabold uppercase tracking-wider text-amber-300 mb-1.5">
                            Kata Sandi Admin
                        </label>
                        <div class="relative">
                            <input
                                type="password"
                                id="admin-password"
                                name="password"
                                required
                                placeholder="Ketik kata sandi"
                                class="w-full bg-[#2a170d] border border-amber-900 focus:border-amber-500 rounded-2xl py-3 pl-4 pr-10 text-sm text-amber-100 placeholder-amber-400/40 focus:outline-none focus:ring-2 focus:ring-amber-500/30 transition"
                            >
                            <span class="absolute right-3.5 top-3.5 text-amber-400/60 text-sm">
                                <i class="fa-solid fa-key"></i>
                            </span>
                        </div>
                    </div>

                    <button
                        type="submit"
                        id="admin-submit-btn"
                        class="w-full py-3 rounded-full bg-gradient-to-r from-amber-500 via-orange-600 to-amber-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold text-xs uppercase tracking-wider shadow-lg transition flex items-center justify-center gap-2 border border-amber-300/30 hover:scale-[1.02]"
                    >
                        <i class="fa-solid fa-lock-open text-xs"></i>
                        <span>Buka Akses Admin</span>
                    </button>
                </form>

                <div class="pt-2 text-center border-t border-amber-950">
                    <span class="text-[11px] text-amber-400/60 font-medium">
                        💡 Shortcut: Tekan <strong class="text-amber-300 bg-[#2a170d] px-2 py-0.5 rounded border border-amber-900">Ctrl + Shift + L</strong> kapan saja.
                    </span>
                </div>
            </div>
        @endif

    </div>
</div>

<script>
    // Global Admin Modal Functions
    function openAdminModal() {
        const modal = document.getElementById('admin-modal');
        const box = document.getElementById('admin-modal-box');
        const input = document.getElementById('admin-email'); // Fokus ke email dulu
        if (!modal) return;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            if (box) {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }
            if (input) {
                input.focus();
            }
        }, 20);
    }

    function closeAdminModal() {
        const modal = document.getElementById('admin-modal');
        const box = document.getElementById('admin-modal-box');
        if (!modal) return;
        if (box) {
            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');
        }
        setTimeout(() => {
            modal.classList.remove('flex');
            modal.classList.add('hidden');
            
            // Clean up URL if it has ?admin=1
            const url = new URL(window.location.href);
            if (url.searchParams.has('admin')) {
                url.searchParams.delete('admin');
                window.history.replaceState({}, '', url);
            }
        }, 300);
    }

    function toggleAdminModal() {
        const modal = document.getElementById('admin-modal');
        if (modal && !modal.classList.contains('hidden')) {
            closeAdminModal();
        } else {
            openAdminModal();
        }
    }

    window.addEventListener('keydown', function(e) {
        const isCtrlOrCmd = e.ctrlKey || e.metaKey;
        const isShift = e.shiftKey;
        const isAlt = e.altKey;
        
        const isLKey = (e.key === 'L' || e.key === 'l' || e.code === 'KeyL' || e.keyCode === 76 || e.which === 76);
        const isAKey = (e.key === 'A' || e.key === 'a' || e.code === 'KeyA' || e.keyCode === 65 || e.which === 65);

        if ((isCtrlOrCmd && isShift && isLKey) || (isAlt && isAKey)) {
            e.preventDefault();
            e.stopPropagation();
            toggleAdminModal();
            return false;
        }

        if (e.key === 'Escape' || e.keyCode === 27) {
            closeAdminModal();
        }
    }, true);

    // Auto-open modal if URL contains admin parameter
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('admin') || window.location.hash === '#admin') {
            openAdminModal();
        }

        const modal = document.getElementById('admin-modal');
        if (modal) {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeAdminModal();
                }
            });
        }
        
        // Handle AJAX Login
        const loginForm = document.getElementById('admin-login-form');
        if (loginForm) {
            loginForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                const btn = document.getElementById('admin-submit-btn');
                const originalHtml = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Memproses...';
                btn.disabled = true;
                
                try {
                    const formData = new FormData(loginForm);
                    const response = await fetch(loginForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });
                    
                    const data = await response.json();
                    
                    if (response.ok && data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 1000
                        }).then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal',
                            text: data.message || 'Kata sandi salah.'
                        });
                        btn.innerHTML = originalHtml;
                        btn.disabled = false;
                    }
                } catch (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error Server',
                        text: 'Terjadi kesalahan sistem. Coba lagi.'
                    });
                    btn.innerHTML = originalHtml;
                    btn.disabled = false;
                }
            });
        }
    });
</script>
