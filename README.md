<div align="center">
  <img src="https://ui-avatars.com/api/?name=Dapur+Kuliner&background=431407&color=fcd34d&size=150&rounded=true&bold=true" alt="DapurKuliner Logo" />
  
  <br/>
  
  # 🍽️ DapurKuliner Resto (Sistem Kasir & Pemesanan Menu)
  
  **Aplikasi Point of Sale (POS) Web Interaktif untuk Restoran dan Rumah Makan** <br>
  Menyajikan cita rasa Nusantara dan Mancanegara dengan fitur pemesanan *real-time* & integrasi pembayaran Midtrans.
  
  <br/>
  
  [![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com/)
  [![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com/)
  [![Alpine.js](https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white)](https://alpinejs.dev/)
  [![Midtrans](https://img.shields.io/badge/Midtrans-00A9E0?style=for-the-badge&logo=midtrans&logoColor=white)](#)
  [![SQLite](https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white)](https://www.sqlite.org/)

</div>

---

## ✨ Fitur Unggulan

- 🛒 **Shopping Cart Real-time**: Mengelola pesanan keranjang belanja dengan **Alpine.js** secara *seamless* tanpa *reload* halaman.
- 💳 **Integrasi Payment Gateway Midtrans**: Simulasi pembayaran online asli mendukung QRIS, Transfer Bank, dan e-Wallet (OVO, GoPay, Dana, dll).
- 🔍 **Pencarian & Filter Cerdas**: Temukan hidangan favorit berdasarkan kata kunci dan kategori (Nusantara, Western, Asia, dll).
- 🤫 **Mode Admin Rahasia (Shortcut Keyboard)**: Tekan `Ctrl + Shift + L` untuk membuka panel *login* tersembunyi.
- 📊 **Riwayat Transaksi**: Pantau dan kelola seluruh pesanan masuk dengan rapi di dalam *dashboard* admin.
- 🛠️ **Maintenance Mode**: Fitur mode pemeliharaan website yang dapat dikendalikan langsung oleh admin.
- 🎨 **UI/UX Modern & Responsif**: Dibangun dengan sentuhan magis *Tailwind CSS* untuk visual layaknya restoran autentik bernuansa hangat.

---

## 🚀 Panduan Setup Lokal

Ingin mencoba menjalankan proyek ini di laptop atau komputer lokal Anda? Ikuti langkah mudah berikut ini.

### 📋 Persyaratan Sistem
- [PHP](https://www.php.net/) (minimal versi 8.2)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)

### 🛠️ Langkah Instalasi

1. **Clone repositori ke lokal Anda**
   ```bash
   git clone https://github.com/USERNAME/project-kelompok.git
   cd project-kelompok
   ```

2. **Instal dependensi Backend & Frontend**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   Salin file `.env.example` menjadi `.env`, lalu *generate key* aplikasi.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Siapkan Database (SQLite)**
   Buat file database kosong (untuk Windows):
   ```bash
   New-Item -ItemType File -Path database\database.sqlite -Force
   ```
   Lalu migrasikan tabel beserta data awal (*seed*):
   ```bash
   php artisan migrate --seed
   ```

5. **Build Aset Tailwind & Vite**
   ```bash
   npm run build
   ```
   *(Opsional: Gunakan `npm run dev` di terminal lain jika ingin mengubah kode CSS/JS secara live)*.

6. **Jalankan Aplikasi!**
   ```bash
   php artisan serve
   ```
   🌐 Aplikasi siap diakses melalui: **[http://localhost:8000](http://localhost:8000)**

---

## 🔐 Mode Admin

Sebagai admin, Anda memiliki kendali penuh untuk menambah, mengubah, atau menghapus menu hidangan, serta memantau riwayat transaksi yang masuk.

- Buka *login popup* tersembunyi dengan menekan tombol **`Ctrl + Shift + L`** di halaman web.
- **Email:** `belajarmandiri03034@gmail.com`
- **Password:** `oimaja25`

*(Pastikan mengubah kredensial ini di mode produksi demi keamanan).*

---

## ☁️ Deployment (Vercel)

Proyek ini telah dibekali dengan berkas `vercel.json` dan `api/index.php`. Aplikasi DapurKuliner ini siap di-*deploy* langsung ke platform *serverless* seperti **Vercel** hanya dengan menghubungkan *repository* GitHub Anda.

---

<div align="center">
  Dibuat dengan ❤️ untuk Tugas Project Web Kelompok.
</div>
