<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Dalam Perbaikan</title>
    <!-- Google Fonts: Plus Jakarta Sans & Playfair Display -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,800;0,900;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Vite CSS & JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#fdfaf5] text-stone-800 flex items-center justify-center min-h-screen p-4 selection:bg-amber-500 selection:text-white">

    <div class="max-w-2xl w-full bg-white rounded-3xl border border-amber-900/10 shadow-xl overflow-hidden text-center p-8 md:p-12">
        <div class="w-24 h-24 bg-amber-100 rounded-full flex items-center justify-center mx-auto mb-6 border border-amber-200">
            <i class="fa-solid fa-person-digging text-5xl text-amber-600"></i>
        </div>
        
        <h1 class="text-3xl md:text-4xl font-black font-serif text-[#2a170d] mb-4">Sistem Sedang Diperbarui</h1>
        
        <p class="text-lg text-stone-600 mb-8 max-w-lg mx-auto">
            {{ $data['message'] ?? 'Mohon maaf, sistem sedang dalam tahap pemeliharaan dan pengembangan sementara.' }}
        </p>

        <div class="bg-[#faf5ee] border border-amber-900/10 rounded-2xl p-6 flex flex-col md:flex-row justify-center gap-6 md:gap-12 text-left w-max mx-auto mb-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center text-lg">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-stone-500 uppercase tracking-widest">Estimasi Selesai</p>
                    <p class="font-black text-stone-800">{{ $data['estimated_time'] ?? 'Secepatnya' }}</p>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center text-lg">
                    <i class="fa-solid fa-user-gear"></i>
                </div>
                <div>
                    <p class="text-xs font-bold text-stone-500 uppercase tracking-widest">Admin / Developer</p>
                    <p class="font-black text-stone-800">{{ $data['admin_name'] ?? 'Admin' }}</p>
                </div>
            </div>
        </div>
        
        <p class="text-sm text-stone-500">Terima kasih atas kesabaran Anda. Kami akan segera kembali!</p>
    </div>
</body>
</html>
