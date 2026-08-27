# DapurKuliner 🍽️

DapurKuliner adalah aplikasi web restoran yang menyajikan cita rasa Nusantara dan Mancanegara. Proyek ini dibangun menggunakan **Laravel 11**, **Tailwind CSS**, dan **Alpine.js**.

## 🚀 Panduan Setup Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan DapurKuliner di komputer lokal Anda.

### Persyaratan Sistem
Pastikan Anda sudah menginstal:
- [PHP](https://www.php.net/) (minimal versi 8.2 atau 8.3)
- [Composer](https://getcomposer.org/)
- [Node.js & npm](https://nodejs.org/)
- Database SQLite (bawaan PHP) atau MySQL (jika menggunakan XAMPP/Laragon)

### Langkah Instalasi

1. **Clone repositori ini**
   ```bash
   git clone https://github.com/USERNAME/project-kelompok.git
   cd project-kelompok
   ```

2. **Instal dependensi PHP & Node.js**
   ```bash
   composer install
   npm install
   ```

3. **Siapkan file konfigurasi lingkungan (.env)**
   ```bash
   cp .env.example .env
   ```

4. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

5. **Konfigurasi Database**
   Secara *default*, proyek ini menggunakan **SQLite**. 
   Buat file database kosong dengan perintah berikut:
   ```bash
   New-Item -ItemType File -Path database\database.sqlite -Force
   ```
   Lalu jalankan migrasi database:
   ```bash
   php artisan migrate
   ```

6. **Build Aset Frontend (Tailwind & Vite)**
   Pastikan Anda melakukan *build* untuk mengompilasi CSS dan JS:
   ```bash
   npm run build
   ```
   *(Jika Anda ingin terus melakukan perubahan kode CSS/JS saat pengembangan, jalankan `npm run dev` di tab terminal terpisah).*

7. **Jalankan Server Lokal**
   ```bash
   php artisan serve
   ```
   Aplikasi Anda kini bisa diakses di [http://localhost:8000](http://localhost:8000).

### 🔑 Akses Admin
Untuk masuk ke mode Admin:
- Buka rute `/admin` atau tekan tombol login Admin di web.
- Masukkan password: `admin123` (atau `admin` / `1234`).

---

## ☁️ Deployment (GitHub & Vercel)

Proyek ini telah dikonfigurasi untuk berjalan di lingkungan *serverless* seperti **Vercel** (`vercel.json` sudah disediakan). Setiap Anda melakukan *push* ke cabang utama di GitHub, Vercel akan otomatis me-rebuild dan men-*deploy* aplikasi ini.
