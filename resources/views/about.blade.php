@extends('layouts.app')

@section('title', 'DapurKuliner - Tentang Kami')

@section('content')
    <!-- Hero Tentang Kami -->
    <section class="relative bg-[#29170e] text-[#faf5ee] py-20 px-4 sm:px-6">
        <div class="absolute inset-0 overflow-hidden">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=2070&auto=format&fit=crop" alt="Suasana Restoran" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-[#29170e]/80 to-[#1a0f09]"></div>
        </div>
        <div class="relative max-w-4xl mx-auto text-center z-10">
            <div class="inline-flex items-center gap-2 text-xs font-black text-amber-500 uppercase tracking-widest mb-4">
                <i class="fa-solid fa-utensils"></i> KISAH KAMI
            </div>
            <h1 class="text-3xl sm:text-5xl font-black font-serif tracking-tight mb-6 text-white drop-shadow-lg">
                Menyajikan Rasa, <br><span class="text-amber-400 italic">Merajut Cerita</span>
            </h1>
            <p class="text-sm sm:text-lg text-amber-100/90 leading-relaxed max-w-2xl mx-auto">
                DapurKuliner lahir dari kecintaan yang mendalam terhadap kekayaan bumbu Nusantara dan cita rasa masakan dunia. Berawal dari dapur kecil di sudut kota, kini kami hadir sebagai tempat berkumpul favorit keluarga dan sahabat.
            </p>
        </div>
    </section>

    <!-- Cerita Restoran -->
    <section class="bg-[#ede3d4] py-16 sm:py-24 border-t border-[#d9c7b0]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                <!-- Gambar Cerita -->
                <div class="w-full lg:w-1/2">
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white/50">
                        <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?q=80&w=2070&auto=format&fit=crop" alt="Chef Memasak" class="w-full h-[400px] object-cover hover:scale-105 transition duration-700">
                        <div class="absolute bottom-4 right-4 bg-white/90 backdrop-blur px-4 py-2 rounded-xl shadow-lg border border-amber-900/10">
                            <p class="text-sm font-bold font-serif text-[#29170e]"><i class="fa-solid fa-fire text-orange-600 mr-1"></i> Sejak 2010</p>
                        </div>
                    </div>
                </div>

                <!-- Teks Cerita -->
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl sm:text-4xl font-black font-serif text-[#29170e] mb-6 leading-tight">Membawa Kehangatan Dapur ke Atas Meja Anda.</h2>
                    <div class="space-y-4 text-stone-600 text-sm sm:text-base leading-relaxed">
                        <p>
                            Bagi kami, makanan bukanlah sekadar pengisi perut, melainkan medium untuk merayakan kebersamaan. DapurKuliner dibangun dengan filosofi sederhana: <strong>Menyajikan hidangan jujur yang dibuat dari hati.</strong>
                        </p>
                        <p>
                            Setiap pagi, koki ahli kami memilih langsung bahan baku segar dari pasar lokal dan petani terpercaya. Bumbu-bumbu ditumbuk manual, kuah kaldu direbus perlahan selama belasan jam untuk menghasilkan kedalaman rasa yang autentik, persis seperti masakan nenek moyang kita.
                        </p>
                        <p>
                            Desain interior restoran kami memadukan elemen kayu klasik dengan sentuhan modern yang hangat, menciptakan suasana bersantap yang nyaman. Baik Anda datang untuk makan malam romantis, pertemuan bisnis, atau sekadar menikmati kopi sore, DapurKuliner adalah rumah kedua Anda.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Nilai-nilai Restoran -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-20">
                <!-- Point 1 -->
                <div class="p-8 rounded-3xl bg-[#faf5ee] border border-[#d9c7b0] shadow-sm hover:shadow-lg transition duration-300 text-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-amber-900/5 translate-y-full group-hover:translate-y-0 transition duration-300"></div>
                    <div class="w-16 h-16 rounded-full bg-white text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-3xl mb-6 font-bold mx-auto shadow-sm relative z-10">
                        <i class="fa-solid fa-leaf"></i>
                    </div>
                    <h3 class="text-xl font-bold font-serif text-[#29170e] mb-3 relative z-10">Bahan Segar & Alami</h3>
                    <p class="text-sm text-stone-600 leading-relaxed relative z-10">
                        Tanpa pengawet, tanpa kompromi. Kami memastikan setiap sayuran, daging, dan rempah yang digunakan adalah kualitas premium dari alam.
                    </p>
                </div>

                <!-- Point 2 -->
                <div class="p-8 rounded-3xl bg-[#faf5ee] border border-[#d9c7b0] shadow-sm hover:shadow-lg transition duration-300 text-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-emerald-900/5 translate-y-full group-hover:translate-y-0 transition duration-300"></div>
                    <div class="w-16 h-16 rounded-full bg-white text-emerald-800 border border-[#d9c7b0] flex items-center justify-center text-3xl mb-6 font-bold mx-auto shadow-sm relative z-10">
                        <i class="fa-solid fa-fire-burner"></i>
                    </div>
                    <h3 class="text-xl font-bold font-serif text-[#29170e] mb-3 relative z-10">Resep Warisan</h3>
                    <p class="text-sm text-stone-600 leading-relaxed relative z-10">
                        Hidangan kami adalah hasil kurasi resep keluarga yang dijaga keasliannya dan disempurnakan dengan teknik memasak profesional.
                    </p>
                </div>

                <!-- Point 3 -->
                <div class="p-8 rounded-3xl bg-[#faf5ee] border border-[#d9c7b0] shadow-sm hover:shadow-lg transition duration-300 text-center relative overflow-hidden group">
                    <div class="absolute inset-0 bg-amber-900/5 translate-y-full group-hover:translate-y-0 transition duration-300"></div>
                    <div class="w-16 h-16 rounded-full bg-white text-amber-800 border border-[#d9c7b0] flex items-center justify-center text-3xl mb-6 font-bold mx-auto shadow-sm relative z-10">
                        <i class="fa-solid fa-face-smile-beam"></i>
                    </div>
                    <h3 class="text-xl font-bold font-serif text-[#29170e] mb-3 relative z-10">Pelayanan dari Hati</h3>
                    <p class="text-sm text-stone-600 leading-relaxed relative z-10">
                        Sapaan ramah dan senyuman tulus adalah standar kami. Kami ingin Anda merasa dimanjakan layaknya tamu kehormatan di rumah kami.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
