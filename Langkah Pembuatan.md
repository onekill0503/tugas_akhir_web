### Buka xampp jalankan apache dan mysql

### install laravel
`composer create-project laravel/laravel toko_mobil`
### install package
`composer require jeroennoten/laravel-adminlte`
`composer require laravel/ui`
`php artisan ui:controllers`
`php artisan ui bootstrap --auth`
`php artisan adminlte:install --type=full`
`php artisan adminlte:plugins install`
`composer require laravelcollective/html`

### konfigurasi database
- buka file .env lalu edit bagian database

### create database dan tabel
- jalankan perintah cmd
`php artisan make:migration mobil`
`php artisan make:migration pembeli`
`php artisan make:migration transaksi`

- dan diubah kodenya di ./database/migration
- jalankan perintah cmd `php aritsan migrate` untuk membuat tabel

### Setting RouteService
- ubah kode pada `./App/Providers/RouteServiceProvider.php` bagian fungsi boot()

### Mengubah struktur menu
- ubah kode pada line 227 - 265 di `./App/config/adminlte.php`

### buat model,controller dan halaman mobil

- jalankan perintah `php artisan make:model Mobil` untuk membuat model Mobil
- lalu ubah kodenya di `./App/Models/`
- jalankan perintah `php artisan make:controller MobilController --resource` untuk membuat Controller Mobil
- lalu ubah kodenya di `./App/Http/Controllers/`
- buat file view index , create , form , dll.

### buat model,controller dan halaman transaksi
- jalankan perintah `php artisan make:model Transaksi`  untuk membuat model Transaksi
- lalu ubah kodenya di `./App/Models/`
- jalankan perintah `php artisan make:model Pembeli` untuk membuat model Pembeli
- lalu ubah kodenya di `./App/Models/`
- Jalankan Perintah `php artisan make:controller TransaksiController --resource` untuk membuat Controller Transaksi
- lalu ubah kodenya di `./App/Http/Controllers/`
- buat file view index , create , form , dll.

### buat controller pembeli dan halaman pembeli
- jalankan perintah `php artisan make:controller PembeliController --resource` untuk membuat Controller Pembeli
- lalu ubah kodenya di `./App/Http/Controllers/`
- buat file view index
