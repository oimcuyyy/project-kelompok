# 📋 Panduan Presentasi Project Web: DapurKuliner Resto

Dokumen ini disusun khusus sebagai bahan panduan presentasi tugas project kelompok mengenai aplikasi web **DapurKuliner Resto (Sistem Pemesanan Menu & Kasir Online)**. Dokumen ini dapat digunakan sebagai bahan penyusunan laporan (Word) maupun salindia presentasi (PowerPoint).

---

## 1. Lokasi & Struktur File Project

Seluruh file dalam proyek ini telah dipisahkan secara rapi dan mengikuti arsitektur MVC pada Laravel. Berikut adalah daftar komponen utama aplikasi beserta lokasinya:

| Komponen | Lokasi File | Fungsi |
| :--- | :--- | :--- |
| **Halaman Utama (Beranda)** | `resources/views/home.blade.php` | Menampilkan Hero banner, statistik jumlah hidangan, dan form pencarian cepat yang diarahkan ke halaman menu. |
| **Halaman Buku Menu & POS** | `resources/views/menu.blade.php` | Menampilkan fitur pencarian, filter kategori hidangan, list/grid card menu makanan, dan tombol "Pesan". |
| **Halaman Detail Menu** | `resources/views/show.blade.php` | Menampilkan detail resep, harga, dan tombol "Tambah ke Keranjang" serta rekomendasi menu terkait. |
| **Halaman Tambah Menu** | `resources/views/create.blade.php` | Form input untuk menambahkan menu baru ke dalam sistem (Khusus Admin). |
| **Halaman Edit Menu** | `resources/views/edit.blade.php` | Form untuk mengedit menu yang sudah ada (Khusus Admin). |
| **Halaman Riwayat Transaksi** | `resources/views/transactions.blade.php` | Laporan data pesanan (checkout) yang telah berhasil tersimpan ke database (Khusus Admin). |
| **Halaman Mode Perawatan** | `resources/views/maintenance-admin.blade.php` | Tampilan panel admin untuk mengatur website agar masuk ke dalam mode pemeliharaan (Maintenance). |
| **Master Layout & Kasir Cart**| `resources/views/layouts/app.blade.php` | Kerangka induk HTML, pemanggilan font, dan logika **Shopping Cart (Kasir)** interaktif menggunakan Alpine.js. |
| **Navbar, Footer & Modal** | `resources/views/layouts/partials/` | Memuat potongan kode UI berulang seperti `navbar`, `footer`, dan `admin_modal` (untuk login rahasia dengan `Ctrl + Shift + L`). |
| **Pengaturan Route & API** | `routes/web.php` | Mengatur logika URL, pencarian menu, filter, proteksi rute admin, proses checkout keranjang belanja, dan Callback Midtrans. |
| **Model Database** | `app/Models/` | Entitas data Eloquent (Recipe, Order, OrderItem) yang menghubungkan menu dan pesanan. |
| **Controller Checkout** | `app/Http/Controllers/CheckoutController.php` | Menangani integrasi Payment Gateway Midtrans (Snap Token & Webhook Callback). |

---

## 2. Teknologi & Program yang Digunakan

1. **Framework Backend**: Laravel (PHP 8.2+) dengan arsitektur **MVC (Model-View-Controller)**.
2. **Database Engine**: **SQLite** (Bawaan Laravel, sangat cepat untuk tahap pengembangan/lokal).
3. **Template Engine**: **Blade Templating** bawaan Laravel.
4. **CSS Framework**: **Tailwind CSS** untuk mendesain antarmuka yang responsif dan modern.
5. **State Management (Frontend)**: **Alpine.js** (Digunakan untuk membuat sistem Keranjang/Kasir yang interaktif secara *real-time* tanpa perlu berpindah halaman).
6. **Payment Gateway**: **Midtrans** (untuk simulasi pembayaran online secara real-time seperti QRIS, Transfer Bank, dan e-Wallet).
7. **Asset Bundler**: **Vite** untuk kompilasi dan build aset (CSS/JS) dengan cepat.
8. **Local Web Server**: **Laragon** berjalan di sistem operasi Windows.

---

## 3. Fitur Utama untuk Didemokan Saat Presentasi

1. **Eksplorasi Katalog Menu**:
   - Tunjukkan halaman **Home** (`/`) yang menyajikan visual menarik layaknya restoran autentik.
   - Buka halaman **Buku Menu** (`/menu`) dan demonstrasikan fitur **Filter Kategori** dan **Pencarian Cerdas**. Misalnya, cari kata "Rendang" atau klik kategori "Nusantara".

2. **Sistem Pemesanan Kasir (Shopping Cart) Secara Real-Time**:
   - Di halaman Buku Menu, klik tombol **"Pesan"** pada beberapa hidangan.
   - Tunjukkan **Sidebar Keranjang** interaktif di sebelah kanan (dibangun dengan Alpine.js) yang muncul secara otomatis.
   - Demonstrasikan fitur menambah/mengurangi jumlah pesanan (`+` / `-`). Total tagihan akan ter-update otomatis secara *real-time*.

3. **Checkout & Integrasi Pembayaran Midtrans**:
   - Pada keranjang belanja, pilih metode pembayaran **"Midtrans"**.
   - Tekan **"Bayar Sekarang"** untuk melakukan *checkout*.
   - Akan muncul halaman atau *popup* Snap Midtrans untuk simulasi pembayaran menggunakan berbagai macam metode (QRIS, GoPay, dsb).

4. **Fitur Rahasia Khusus Admin (Akses Tersembunyi)**:
   - Tekan kombinasi tombol **`Ctrl + Shift + L`** untuk memunculkan modal login Admin secara rahasia.
   - Masukkan email `belajarmandiri03034@gmail.com` dan password `oimaja25`.
   - Setelah masuk, tunjukkan perubahan di halaman: munculnya tombol **Edit** & **Hapus** pada tiap hidangan, serta tombol navigasi baru **"Riwayat Transaksi"**.

5. **Manajemen Data (CRUD) & Riwayat Transaksi (Khusus Admin)**:
   - Buka halaman **Riwayat Transaksi** untuk membuktikan bahwa data pesanan pelanggan yang dibayar telah tersimpan utuh di database (menyimpan rincian pesanan dan status pembayaran).
   - Tunjukkan cara Admin bisa menambahkan menu baru atau mengedit menu yang sudah ada secara langsung dari antarmuka web.

6. **Mode Pengembangan (Maintenance Mode)**:
   - Buka panel pengaturan Mode Perawatan (Maintenance) sebagai Admin.
   - Aktifkan mode tersebut. Buka browser di jendela penyamaran (*Incognito*) untuk menunjukkan pengunjung biasa tidak bisa mengakses web, namun Admin tetap bisa bekerja secara normal.

---

## 4. Naskah Singkat Presentasi Kelompok

> **Pembukaan:**
> *"Selamat pagi/siang bapak/ibu dosen dan teman-teman. Kami dari kelompok [Nama Kelompok] ingin mempresentasikan hasil proyek aplikasi web kami yang berjudul **DapurKuliner Resto**."*
>
> **Konsep & Tujuan:**
> *"Aplikasi ini adalah platform pemesanan makanan layaknya kasir online (Point of Sale). Tujuannya untuk mendigitalisasi proses pemesanan restoran, di mana pelanggan bisa melihat katalog menu, menggunakan keranjang belanja interaktif, dan langsung melakukan checkout."*
>
> **Teknologi & Fitur Unggulan:**
> *"Aplikasi ini dibangun menggunakan arsitektur MVC dari **Laravel**, dipercantik dengan **Tailwind CSS**, dan dilengkapi dengan **Alpine.js** untuk mengelola status keranjang belanja secara real-time. Kami juga mengintegrasikan sistem **Payment Gateway Midtrans** untuk mendukung simulasi pembayaran nontunai sesungguhnya. Seluruh data pesanan pelanggan diproses dan disimpan secara terstruktur ke dalam database SQLite yang dapat di-review oleh Admin melalui menu Riwayat Transaksi."*
>
> **Fitur Keamanan / Tambahan:**
> *"Selain itu, kami menambahkan fitur keamanan tersembunyi berupa **Login Modal Khusus Admin** menggunakan shortcut keyboard, yang mana Admin bisa mengelola keseluruhan menu dan mengaktifkan **Maintenance Mode** apabila diperlukan."*
>
> **Penutup:**
> *"Sekian presentasi dari kelompok kami. Terima kasih banyak atas perhatiannya, dan kami siap menjawab pertanyaan atau masukan dari bapak/ibu dosen serta teman-teman sekalian."*
