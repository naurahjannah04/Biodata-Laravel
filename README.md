# Ruang Biodata

Aplikasi biodata personal berbasis Laravel dengan halaman profil publik dan dashboard admin.

## Menjalankan aplikasi

1. Pastikan PHP, Composer, dan Node.js tersedia, lalu pasang dependensi:

   ```sh
   composer install
   npm install
   ```

2. Jalankan migrasi dan isi data awal:

   ```sh
   php artisan migrate --seed
   ```

3. Bangun aset dan jalankan aplikasi:

   ```sh
   npm run build
   php artisan serve
   ```

Buka URL lokal yang ditampilkan Artisan. Untuk mengubah biodata, pilih **Admin** dari halaman publik atau buka `/admin/login`.

## Akun admin lokal

Saat `APP_ENV=local`, data awal memakai akun berikut:

- Email: `admin@example.com`
- Kata sandi: `password`

Ganti kata sandi tersebut sebelum aplikasi dipublikasikan. Di lingkungan selain lokal, atur `BIODATA_ADMIN_EMAIL` dan `BIODATA_ADMIN_PASSWORD` sebelum menjalankan `php artisan db:seed`; aplikasi tidak menyediakan akun produksi bawaan.

Admin dapat mengubah identitas, kontak, foto lewat URL, tentang saya, keahlian, pengalaman, pendidikan, dan tautan sosial. Perubahan tersimpan di database dan langsung tampil di halaman publik.
