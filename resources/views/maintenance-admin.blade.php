@extends('layouts.admin')

@section('title', 'Mode Pengembangan - Admin')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="mb-8 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-black font-serif text-[#29170e]">Pengaturan Website</h1>
            <p class="text-stone-600 mt-2 text-sm sm:text-base">Kelola status dan mode pemeliharaan website Anda.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-100 text-emerald-800 border border-emerald-200 rounded-xl font-bold flex items-center gap-2">
            <i class="fa-solid fa-circle-check"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Maintenance Mode Settings -->
    <div class="bg-white rounded-2xl border border-amber-900/10 shadow-sm overflow-hidden p-6 relative max-w-4xl">
        <div class="absolute top-0 left-0 w-1 h-full {{ file_exists(storage_path('app/maintenance.json')) ? 'bg-amber-500' : 'bg-stone-300' }}"></div>
        <h2 class="text-xl font-bold font-serif text-[#29170e] mb-4"><i class="fa-solid fa-person-digging text-amber-500 mr-2"></i> Mode Pengembangan (Maintenance)</h2>
        
        <p class="text-stone-500 text-sm mb-6">Jika fitur ini diaktifkan, pengunjung awam tidak akan bisa mengakses halaman utama atau melakukan transaksi. Website akan dialihkan ke halaman pemberitahuan perbaikan. Anda (sebagai Admin) tetap dapat mengakses seluruh fitur seperti biasa.</p>

        <form action="{{ route('admin.maintenance.toggle') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div x-data="{ isMaintenanceOn: {{ file_exists(storage_path('app/maintenance.json')) ? 'true' : 'false' }} }">
                    <label class="block text-sm font-bold text-stone-700 mb-4">Status Website</label>
                    <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                        <input type="hidden" name="status" :value="isMaintenanceOn ? 'on' : 'off'">
                        
                        <!-- Toggle Switch -->
                        <div class="flex-shrink-0">
                            <button type="button" @click="isMaintenanceOn = !isMaintenanceOn" 
                                class="relative inline-flex h-8 w-14 flex-shrink-0 cursor-pointer rounded-full transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-amber-600 focus:ring-offset-2 border-2 border-transparent"
                                :class="isMaintenanceOn ? 'bg-amber-600' : 'bg-stone-300'"
                                role="switch" :aria-checked="isMaintenanceOn.toString()">
                                <span class="pointer-events-none absolute top-[2px] bottom-[2px] w-[24px] rounded-full bg-white shadow ring-0 transition-all duration-200 ease-in-out"
                                    :class="isMaintenanceOn ? 'left-[calc(100%-24px-2px)]' : 'left-[2px]'"></span>
                            </button>
                        </div>
                        <span class="text-sm font-bold block" :class="isMaintenanceOn ? 'text-amber-700' : 'text-emerald-600'" x-text="isMaintenanceOn ? 'Sedang Ditutup (Mode Pengembangan)' : 'Normal (Bisa Diakses)'"></span>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-2">Estimasi Selesai</label>
                    <input type="text" name="estimated_time" placeholder="Contoh: Besok Pagi, Jam 15:00" value="{{ $maintenanceData['estimated_time'] ?? '' }}" class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:outline-none focus:border-amber-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-stone-700 mb-2">Nama Admin / Developer</label>
                    <input type="text" name="admin_name" placeholder="Nama Anda" value="{{ $maintenanceData['admin_name'] ?? '' }}" class="w-full px-4 py-2 border border-stone-300 rounded-xl focus:outline-none focus:border-amber-500">
                </div>
            </div>
            <div class="mb-6">
                <label class="block text-sm font-bold text-stone-700 mb-2">Pesan Tambahan (Opsional)</label>
                <textarea name="message" rows="3" placeholder="Mohon maaf, sistem sedang dalam perbaikan..." class="w-full px-4 py-3 border border-stone-300 rounded-xl focus:outline-none focus:border-amber-500">{{ $maintenanceData['message'] ?? 'Mohon maaf, sistem sedang dalam tahap pemeliharaan dan pengembangan sementara.' }}</textarea>
            </div>
            <button type="submit" style="background-color: #ea580c; color: #ffffff;" class="font-bold py-3 px-8 rounded-xl transition shadow-sm flex items-center gap-2 mt-4 hover:opacity-90">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Pengaturan
            </button>
        </form>
    </div>
</div>
@endsection
