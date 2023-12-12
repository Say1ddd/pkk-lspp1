# PKK PROJECT - LSPP1

Project penilaian ujian praktek mata pelajaran PKK.

## Persyaratan

 Pastikan telah menginstall package berikut didalam lokal machine:

- [Git](https://git-scm.com/downloads)
- [PHP](https://www.php.net/manual/en/install.php)
- [Composer](https://getcomposer.org/download/)

### Cara Clone Repository

Buka terminal atau command prompt dan navigasi ke direktori tempat ingin menyimpan clone repository ini

```bash
cd path/to/parent/directory
```

Clone repository menggunakan perintah git

```bash
git clone https://github.com/Say1ddd/lspp1.git
```

Install package yang diperlukan

```bash
composer install
```

Membuat file konfigurasi .env (ubah .env sesuai dengan konfigurasi database)

```bash
cp .env.example .env
```

Generate key aplikasi laravel

```bash
php artisan key:generate
```

Migrasi tabel (pastikan database user telah memiliki akses ALL PRIVILEGES dan SUPER sebelum menjalankan migrasi)

```bash
php artisan migrate
```

## Hasil

Jika seluruh ketentuan diatas terpenuhi, project sudah bisa dideploy dan diakses

```bash
php artisan serve
```
