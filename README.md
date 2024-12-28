## 🛠️ Panduan Instalasi Proyek

Berikut adalah langkah-langkah untuk menginstal proyek Laravel:

### Prasyarat

Pastikan Anda telah menginstal [Composer](https://getcomposer.org/) di sistem Anda sebelum memulai instalasi.

### Langkah-langkah

**1.** Clone repositori proyek Laravel Anda ke direktori lokal:

```bash
git clone https://github.com/jumiatiriyanaa/in-your-dream.git
```

**2.** Masuk ke direktori proyek:

```bash
cd in-your-dream
```

**3.** Install dependensi PHP menggunakan composer:

```bash
composer install
```

**4.** Ubah nama file .env.example menjadi .env. Ini adalah file konfigurasi Laravel:

**Windows:**

```bash
cp .env.example .env
```

**Linux, macOS:**

```bash
mv .env.example .env
```

**5.** Buat database dengan nama sesuai proyek Anda, misalnya "in_your_dream", dan konfigurasikan file .env untuk mengatur nama database:

Buka file .env menggunakan editor teks dan temukan baris berikut:

```bash
DB_DATABASE=laravel
```

Gantilah database_name dengan nama yang Anda gunakan untuk database. Misalnya:

```bash
DB_DATABASE=in_your_dream
```

**6.** Buat kunci aplikasi:

```bash
php artisan key:generate
```

**7.** Buat dan jalankan migrasi database (dalam hal ini, kita menggunakan migrate:fresh untuk menghapus dan mengisi ulang data database):

```bash
php artisan migrate:fresh --seed
```

**8.** Jalankan perintah untuk menyambungkan storage:

```bash
php artisan storage:link
```

**9.** Jalankan server pengembangan Laravel:

```bash
php artisan serve
```

Setelah mengikuti langkah-langkah di atas, proyek Laravel Anda kini siap digunakan dan dapat diakses melalui browser di http://localhost:8000.

Login Admin:

-   Email : bimonugraha@gmail.com
-   Password : bimbimoo
