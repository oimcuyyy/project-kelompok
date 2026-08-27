# 📋 Panduan Presentasi Project Web: DapurKuliner Resto

Dokumen ini disusun khusus sebagai bahan panduan presentasi tugas project kelompok mengenai aplikasi web **DapurKuliner Resto (Sistem Pemesanan Menu & Kasir Online)**.

---

## 1. Lokasi & Struktur File Project

Seluruh file dalam proyek ini telah dipisahkan secara rapi:

| Komponen | Lokasi File | Fungsi |
| :--- | :--- | :--- |
| **Halaman Utama (Beranda)** | `resources/views/home.blade.php` | Menampilkan Hero banner, pencarian hidangan, filter kategori, dan grid card menu makanan beserta tombol "Pesan". |
| **Halaman Detail Menu** | `resources/views/show.blade.php` | Menampilkan detail komposisi bahan makanan, harga, dan tombol "Tambah ke Keranjang". |
| **Halaman Tambah Menu** | `resources/views/create.blade.php` | Form input menu baru (Khusus Admin). |
| **Halaman Riwayat Transaksi** | `resources/views/transactions.blade.php` | Laporan data pesanan (checkout) yang telah berhasil tersimpan ke database (Khusus Admin). |
| **Master Layout & Kasir Cart** | `resources/views/layouts/app.blade.php` | Kerangka induk HTML, pemanggilan font Google, dan logika **Shopping Cart (Kasir)** menggunakan Alpine.js. |
| **Navbar & Footer** | `resources/views/layouts/partials/` | Header navigasi, menu utama, form pencarian, dan tautan informasi footer. |
| **Modal Login Admin** | `resources/views/layouts/partials/admin_modal.blade.php` | Dialog pop-up login rahasia khusus shortcut keyboard `Ctrl + Shift + L`. |
| **File CSS & JavaScript** | `resources/css/app.css` & `resources/js/app.js` | Styling tema Restoran dan fungsi interaktif (shortcut admin, notifikasi). |
| **Pengaturan Route & API** | `routes/web.php` | Mengatur logika URL, pencarian menu, filter, proteksi admin, dan Endpoint API `/api/checkout` untuk memproses pesanan keranjang ke database. |
| **Model & Database** | `app/Models/` (Recipe, Order, OrderItem) | Entitas data Eloquent Laravel. Menghubungkan menu, data pesanan (Order), dan detail pesanan (OrderItem). |
| **Data 30+ Menu (Seeder)** | `database/seeders/RecipeSeeder.php` | Data awal 31 menu masakan lengkap beserta harga dan pencarian gambar otomatis via API Bing Thumbnail. |

---

## 2. Teknologi & Program yang Digunakan

1. **Framework Backend**: Laravel (PHP 8.2+) dengan arsitektur **MVC (Model-View-Controller)**.
2. **Database Engine**: **SQLite** (Bawaan Laravel, cepat untuk lokal dan bisa mudah di-*upgrade* ke Supabase/PostgreSQL jika di-deploy).
3. **Template Engine**: **Blade Templating** bawaan Laravel.
4. **CSS Framework & Styling**: **Tailwind CSS**.
5. **State Management & Frontend Reactive**: **Alpine.js** (Digunakan untuk membuat sistem Keranjang/Kasir yang *real-time* dan interaktif).
6. **Integrasi Eksternal**: **Bing Image Search / Thumbnail API** (untuk mengambil gambar menu yang selalu akurat sesuai nama makanannya).
7. **Asset Bundler**: **Vite** untuk build aset.
8. **Local Web Server**: **Laragon** di OS Windows.

---

## 3. Fitur Utama untuk Didemokan Saat Presentasi

1. **Katalog 30+ Hidangan Akurat**:
   - Jelaskan bahwa data gambar diambil secara *real-time* dan dinamis berdasarkan pencarian kata kunci nama makanan ke mesin pencari, sehingga gambarnya 100% akurat (Nasi Goreng pasti gambar Nasi Goreng).
2. **Pencarian Cerdas Multi-Kategori**:
   - Cari berdasarkan nama hidangan atau komposisi masakan (*Rendang, Ayam, Soto, Bakso, Dimsum*).
3. **Sistem Pemesanan Kasir (Shopping Cart) & Checkout**:
   - Klik tombol **"Pesan"** di halaman depan atau detail menu.
   - Akan muncul **Sidebar Keranjang** interaktif di sebelah kanan (dibangun menggunakan Alpine.js).
   - Demonstrasikan menambah/mengurangi jumlah pesanan (`+` / `-`), total tagihan akan ter-update otomatis secara *real-time*.
   - Tekan **"Bayar Sekarang"** dan tunjukkan pesan sukses (AJAX request mengirim data ke backend).
4. **Fitur Rahasia Khusus Admin & Riwayat Transaksi**:
   - Tekan **`Ctrl + Shift + L`** untuk memunculkan modal rahasia login Admin.
   - Masukkan password: **`admin123`** (atau `admin`).
   - Tunjukkan tombol baru **"Riwayat Transaksi"**.
   - Buka halaman tersebut untuk membuktikan bahwa data pesanan yang dibayar di poin 3 sebelumnya telah benar-benar **disimpan secara permanen ke database SQLite** (beserta detail menu dan harga totalnya).

---

## 4. Naskah Singkat Presentasi Kelompok

> **Pembukaan:**
> *"Selamat pagi/siang bapak/ibu dosen dan teman-teman. Kami dari kelompok [Nama Kelompok] ingin mempresentasikan hasil pembuatan aplikasi web **DapurKuliner Resto**."*
>
> **Konsep & Tujuan:**
> *"DapurKuliner Resto adalah platform pemesanan makanan layaknya kasir online (Point of Sale). Tujuannya mendigitalisasi proses pemesanan restoran, di mana pelanggan bisa memilih menu, melihat deksripsi komposisi, memasukkannya ke keranjang belanja interaktif, dan langsung memproses pesanan ke dalam database."*
>
> **Teknologi & Fitur Unggulan:**
> *"Aplikasi ini dibangun dengan Laravel, Tailwind CSS, dan Alpine.js untuk fitur keranjang belanja yang real-time tanpa perlu loading halaman. Kami juga mengintegrasikan API eksternal untuk pencarian gambar otomatis yang akurat. Selain itu, pesanan pelanggan diproses langsung melalui sistem API ke database SQLite, yang buktinya dapat dilihat pada panel Riwayat Transaksi khusus Admin."*
>
> **Penutup:**
> *"Sekian presentasi dari kami, terima kasih banyak dan kami siap menjawab pertanyaan."*
