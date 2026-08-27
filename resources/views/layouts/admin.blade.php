<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard - DapurKuliner.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard - DapurKuliner')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                        serif: ['"Playfair Display"', 'Georgia', 'serif'],
                    },
                    colors: {
                        resto: {
                            dark: '#1c120c',
                            wood: '#431407',
                            amber: '#d97706',
                            gold: '#f59e0b',
                            cream: '#faf5ee',
                            warm: '#f5ede2',
                        }
                    }
                }
            }
        }
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-[#292524] font-sans flex flex-col md:flex-row min-h-screen antialiased" x-data="{ sidebarOpen: false }">

    <!-- Mobile Header (Hamburger) -->
    <div class="md:hidden bg-[#2a170d] text-white p-4 flex items-center justify-between shadow-md z-40 sticky top-0">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-amber-400 to-orange-600 flex items-center justify-center text-[#2a170d] font-black text-sm">
                DK
            </div>
            <span class="font-serif font-bold text-lg">Admin Panel</span>
        </div>
        <button @click="sidebarOpen = !sidebarOpen" class="text-amber-100 hover:text-white focus:outline-none">
            <i class="fa-solid fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Sidebar / Drawer -->
    <div 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 bg-[#2a170d] text-amber-50 shadow-2xl transform transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex flex-col h-screen"
    >
        <!-- Sidebar Header -->
        <div class="p-6 flex items-center justify-between border-b border-amber-900/50">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-orange-600 flex items-center justify-center text-[#2a170d] font-black text-lg shadow-lg">
                    DK
                </div>
                <div>
                    <h2 class="font-serif font-black text-xl leading-tight">Admin</h2>
                    <p class="text-[10px] text-amber-400 font-bold tracking-widest uppercase">DapurKuliner</p>
                </div>
            </div>
            <button @click="sidebarOpen = false" class="md:hidden text-amber-300 hover:text-white">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <!-- Sidebar Navigation -->
        <div class="p-4 flex-1 overflow-y-auto space-y-1">
            <p class="px-3 text-[10px] font-black text-stone-500 uppercase tracking-widest mb-2 mt-4">Menu Utama</p>
            
            <a href="{{ route('transactions.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-semibold {{ request()->routeIs('transactions.index') ? 'bg-amber-600 text-white shadow-md' : 'text-stone-300 hover:bg-stone-800 hover:text-white' }}">
                <i class="fa-solid fa-file-invoice w-5 text-center {{ request()->routeIs('transactions.index') ? 'text-amber-200' : 'text-stone-400' }}"></i>
                <span>Transaksi</span>
            </a>
            
            <a href="{{ route('recipes.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-semibold {{ request()->routeIs('recipes.create') ? 'bg-amber-600 text-white shadow-md' : 'text-stone-300 hover:bg-stone-800 hover:text-white' }}">
                <i class="fa-solid fa-plus w-5 text-center {{ request()->routeIs('recipes.create') ? 'text-amber-200' : 'text-stone-400' }}"></i>
                <span>Tambah Menu</span>
            </a>

            <p class="px-3 text-[10px] font-black text-stone-500 uppercase tracking-widest mb-2 mt-8">Akses Publik</p>
            
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-semibold text-stone-300 hover:bg-stone-800 hover:text-white">
                <i class="fa-solid fa-store w-5 text-center text-stone-400"></i>
                <span>Lihat Resto</span>
            </a>
        </div>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-amber-900/50">
            <a href="{{ route('admin.logout') }}" class="flex items-center justify-center gap-2 w-full px-4 py-2.5 rounded-xl bg-red-950/40 text-red-400 hover:bg-red-900 hover:text-white transition-all font-bold text-sm border border-red-900/30">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span>Keluar Mode Admin</span>
            </a>
        </div>
    </div>

    <!-- Overlay for Mobile Sidebar -->
    <div 
        x-show="sidebarOpen" 
        @click="sidebarOpen = false"
        x-transition.opacity
        class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 md:hidden"
        style="display: none;"
    ></div>

    <!-- Main Content Area -->
    <main class="flex-1 w-full flex flex-col h-screen overflow-y-auto bg-stone-50">
        @yield('content')
    </main>

    <!-- Flash Messages -->
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });
        });
    </script>
    @endif

    <script>
        function confirmDelete(event, title, text) {
            event.preventDefault();
            const form = event.target;
            Swal.fire({
                title: title || 'Apakah Anda yakin?',
                text: text || 'Tindakan ini tidak dapat dibatalkan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#9ca3af',
                confirmButtonText: 'Ya, Lanjutkan!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
