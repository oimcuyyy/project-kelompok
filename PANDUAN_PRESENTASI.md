# 📋 Panduan Presentasi Project Web: DapurKuliner

Dokumen ini disusun khusus sebagai bahan panduan presentasi tugas project kelompok mengenai aplikasi web **DapurKuliner (Rumah Resep & Cita Rasa Nusantara)**.

---

## 1. Lokasi & Struktur File Project

Seluruh file dalam proyek ini telah dipisahkan secara rapi:

| Komponen | Lokasi File | Fungsi |
| :--- | :--- | :--- |
| **Halaman Utama (Beranda)** | `resources/views/home.blade.php` | Menampilkan Hero banner, pencarian hidangan, filter kategori menu, dan grid card resep. |
| **Halaman Detail Resep** | `resources/views/show.blade.php` | Menampilkan foto banner masakan, checklist bahan dapur interaktif, dan langkah memasak bernomor. |
| **Halaman Tambah Resep** | `resources/views/create.blade.php` | Form input resep baru lengkap dengan live image preview (Khusus Admin). |
| **Master Layout** | `resources/views/layouts/app.blade.php` | Kerangka induk HTML, pemanggilan font Google, favicon, dan integrasi aset `@vite`. |
| **Navbar (Menu Atas)** | `resources/views/layouts/partials/navbar.blade.php` | Header navigasi berlogo DapurKuliner, menu buku hidangan, dan form pencarian. |
| **Footer (Menu Bawah)** | `resources/views/layouts/partials/footer.blade.php` | Tautan kategori populer, navigasi, dan jam operasional inspirasi harian. |
| **Modal Login Admin** | `resources/views/layouts/partials/admin_modal.blade.php` | Dialog pop-up login rahasia khusus shortcut keyboard `Ctrl + Shift + L`. |
| **File CSS Kustom** | `resources/css/app.css` | Seluruh kode styling tema Rumah Makan/Resto (warna kayu mahogany, emas, custom scrollbar, checklist coret). |
| **File JavaScript** | `resources/js/app.js` | Logika interaktif shortcut `Ctrl + Shift + L`, checklist bahan, auto-hitung progress bahan, dan live preview foto. |
| **Pengaturan Route & Controller** | `routes/web.php` | Mengatur logika URL, pencarian multi-kata kunci, filter kategori, validasi simpan, dan proteksi admin. |
| **Model Database** | `app/Models/Recipe.php` | Entitas data Eloquent Laravel dengan izin mass-assignment `$fillable`. |
| **Data 27+ Resep (Seeder)** | `database/seeders/RecipeSeeder.php` | Kumpulan 27 menu masakan lengkap (Nusantara, Western, Asia, Sehat, Kue & Dessert, Minuman). |
| **Logo Favicon Tab Browser** | `public/favicon.svg` | Ikon vektor bertema kuliner (piring saji & sendok garpu) untuk tab browser. |

---

## 2. Teknologi & Program yang Digunakan

1. **Framework Backend**: Laravel (PHP 8.2+) dengan arsitektur **MVC (Model-View-Controller)**.
2. **Database Engine**: **SQLite** (dikelola via Laragon).
3. **Template Engine**: **Blade Templating** bawaan Laravel.
4. **CSS Framework & Styling**: **Tailwind CSS** + **Custom CSS** (`resources/css/app.css`).
5. **Bahasa Pemrograman Frontend**: **Vanilla JavaScript ES6** (`resources/js/app.js`).
6. **Asset Bundler**: **Vite** untuk build aset yang cepat dan ringan.
7. **Local Web Server**: **Laragon** di sistem operasi Windows.

---

## 3. Fitur Utama untuk Didemokan Saat Presentasi

1. **Katalog 27+ Hidangan Lengkap**:
   - Jelaskan bahwa data sudah mencakup 6 kategori masakan (Nusantara, Western, Asia, Sehat, Kue & Dessert, Minuman).
2. **Pencarian Cerdas Multi-Kategori**:
   - Cari berdasarkan nama hidangan (*Rendang, Pizza, Soto, Bakso, Dimsum*).
   - Cari berdasarkan bahan masakan (*Ayam, Sapi, Salmon, Keju, Kopi, Alpukat*).
   - Cari berdasarkan rasa/olahan (*Pedas, Kuah, Goreng, Creamy*).
3. **Checklist Bahan Dapur Interaktif**:
   - Di halaman detail resep, klik checkbox bahan. Teks bahan akan otomatis tercoret (*line-through*) dan angka `X/Y bahan siap` akan bertambah.
4. **Fitur Rahasia Khusus Admin (`Ctrl + Shift + L`)**:
   - Jelaskan bahwa tombol admin sengaja disembunyikan agar pengunjung biasa tidak bisa sembarangan menambah/menghapus resep.
   - Tekan **`Ctrl + Shift + L`** (atau ketik `/admin` di URL).
   - Masukkan password: **`admin123`** (atau `admin`).
   - Tunjukkan bahwa tombol `+ Tulis Resep` dan tombol `Hapus Menu` kini muncul khusus untuk Admin.

---

## 4. Naskah Singkat Presentasi Kelompok

> **Pembukaan:**
> *"Selamat pagi/siang bapak/ibu dan teman-teman. Kami dari kelompok [Nama Kelompok] ingin mempresentasikan hasil pembuatan website **DapurKuliner**."*
>
> **Konsep & Tujuan:**
> *"DapurKuliner adalah platform katalog resep masakan berbasis web dengan nuansa visual Rumah Makan Nusantara. Tujuannya mempermudah masyarakat menemukan inspirasi hidangan harian dengan panduan takaran bahan dan langkah yang teruji."*
>
> **Teknologi:**
> *"Website ini dibangun menggunakan Laravel, Blade Templating, Tailwind CSS, Custom JS, dan database SQLite dengan pemisahan struktur file MVC yang rapi."*
>
> **Penutup:**
> *"Sekian presentasi dari kami, terima kasih banyak dan kami siap menjawab pertanyaan."*
