@extends('layouts.app')

@section('title', 'DapurKuliner - Tentang Kami')

@section('content')
    <!-- Section Tentang Kami (About Us) -->
    <section id="about" class="bg-[#ede3d4] py-16 border-t border-[#d9c7b0] min-h-[70vh] flex flex-col justify-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <div class="inline-flex items-center gap-1.5 text-xs font-black text-amber-800 uppercase tracking-widest mb-2">
                    <i class="fa-solid fa-store"></i> TENTANG KAMI
                </div>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black font-serif text-[#29170e] tracking-tight">Kisah DapurKuliner</h2>
                <p class="text-stone-600 text-sm mt-2">Lebih dari sekadar restoran, kami adalah rumah bagi setiap cita rasa yang dirindukan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Point 1 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        <i class="fa-solid fa-leaf text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Bahan Baku Pilihan</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Kami bekerja sama dengan petani lokal untuk memastikan setiap sayuran, rempah, dan protein yang kami sajikan segar dari alam dan bebas pengawet. Kualitas bahan adalah prioritas utama kami.
                    </p>
                </div>

                <!-- Point 2 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-emerald-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        <i class="fa-solid fa-fire-burner text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Resep Warisan</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Menu-menu kami merupakan hasil kurasi resep tradisional yang telah diwariskan dari generasi ke generasi, disajikan dengan teknik memasak modern yang menjaga keaslian rasanya.
                    </p>
                </div>

                <!-- Point 3 -->
                <div class="p-7 rounded-3xl bg-white border border-[#d9c7b0] shadow-sm hover:shadow-md transition">
                    <div class="w-12 h-12 rounded-2xl bg-[#faf5ee] text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-2xl mb-4 font-bold">
                        <i class="fa-solid fa-face-smile-beam text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold font-serif text-[#29170e] mb-2">Pelayanan Hangat</h3>
                    <p class="text-xs sm:text-sm text-stone-600 leading-relaxed">
                        Suasana restoran didesain agar Anda merasa seperti di rumah sendiri. Staf kami dilatih untuk menyambut Anda dengan senyuman dan siap memberikan pengalaman bersantap terbaik.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
