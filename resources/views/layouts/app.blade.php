<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DapurKuliner - Rumah Resep & Cita Rasa Masakan Nusantara dan Mancanegara.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DapurKuliner - Rumah Resep & Cita Rasa Nusantara')</title>

    <!-- Favicon Logo DapurKuliner -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' stop-color='%23f59e0b'/%3E%3Cstop offset='50%25' stop-color='%23ea580c'/%3E%3Cstop offset='100%25' stop-color='%239a3412'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect width='512' height='512' rx='128' fill='url(%23g)'/%3E%3Cg fill='%23ffffff' transform='translate(100,100) scale(0.61)'%3E%3Cpath d='M120 40 C120 20 100 20 100 40 L100 160 C100 190 120 210 150 210 L150 460 C150 480 170 480 170 460 L170 210 C200 210 220 190 220 160 L220 40 C220 20 200 20 200 40 L200 130 C200 140 190 150 180 150 L180 40 C180 20 160 20 160 40 L160 150 C150 150 140 140 140 130 L140 40 C140 20 120 20 120 40 Z'/%3E%3Cpath d='M350 40 C320 60 300 120 300 200 C300 215 310 225 325 225 L340 225 L340 460 C340 480 360 480 360 460 L360 40 C360 25 355 35 350 40 Z'/%3E%3Cpath d='M255 30 C205 30 190 85 190 140 C190 195 220 215 245 220 L245 460 C245 480 265 480 265 460 L265 220 C290 215 320 195 320 140 C320 85 305 30 255 30 Z'/%3E%3C/g%3E%3C/svg%3E">
    <link rel="alternate icon" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display (Aesthetic Resto) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- FontAwesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Tailwind CSS CDN -->
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

    <!-- Vite Assets (CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#faf5ee] text-[#292524] font-sans flex flex-col min-h-screen antialiased">

    @if(session('is_admin'))
        <!-- Admin Floating Bar -->
        <div class="bg-gradient-to-r from-[#2a170d] via-[#431407] to-[#2a170d] text-amber-100 text-xs px-4 py-2 shadow-lg border-b border-amber-500/40 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="bg-amber-500 text-[#180e08] font-black px-2.5 py-0.5 rounded-full text-[10px] uppercase tracking-wider shadow-sm">👑 ADMIN MODE</span>
                    <span class="hidden sm:inline text-amber-200/90 font-medium">Selamat datang, Anda memiliki akses kelola & edit resep.</span>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('recipes.create') }}" class="bg-gradient-to-r from-amber-500 to-orange-600 hover:from-amber-600 hover:to-orange-700 text-white font-extrabold px-3.5 py-1 rounded-full text-xs transition shadow flex items-center gap-1.5 border border-amber-400/30">
                        <i class="fa-solid fa-plus text-[10px]"></i>
                        <span>Tulis Resep</span>
                    </a>
                    <a href="{{ route('admin.logout') }}" class="bg-[#180e08]/70 hover:bg-rose-950/80 text-amber-300 hover:text-rose-200 px-3 py-1 rounded-full text-xs font-bold transition border border-amber-700/50 flex items-center gap-1">
                        <i class="fa-solid fa-right-from-bracket text-[10px]"></i>
                        <span>Keluar Admin</span>
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- Header / Navbar Resto -->
    @include('layouts.partials.navbar')

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Resto -->
    @include('layouts.partials.footer')

    <!-- Admin Authentication Modal (Ctrl + Shift + L) -->
    @include('layouts.partials.admin_modal')

    @stack('scripts')
</body>
</html>
