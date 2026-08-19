<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DapurKuliner - Rumah Resep & Cita Rasa Masakan Nusantara dan Mancanegara.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DapurKuliner - Rumah Resep & Cita Rasa Nusantara')</title>

    <!-- Favicon Logo DapurKuliner -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="alternate icon" href="{{ asset('favicon.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('favicon.svg') }}">

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
