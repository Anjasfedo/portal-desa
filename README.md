<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Website Portal Desa Dinamis



Website portal desa Laravel adalah sebuah website yang dibangun menggunakan framework Laravel. Website ini dapat digunakan oleh pemerintah desa untuk mengelola berbagai informasi dan layanan kepada masyarakat.. Berikut adalah beberapa fitur dan komponen utama yang dapat ada dalam aplikasi POS berbasis web Laravel:



# Fitur
1. Menampilkan Beranda/Landing page
2. Menampilkan Profil Desa 
     - Wilayah
    - Sejarah
    - Visi-misi
    - Perangkat desa
    - Peta desa
3. Menampilkan Umkm Desa
4. Menampilkan Berita Desa
5. Menampilkan Data Desa (Tabel & Grafik)
    - Data Agama
    - Data Pekerjaan
    - Data Jenis kelamin
6. Kontak



## Teknologi

Aplikasi Point of Sale dibangun menggunakan beberapa Teknologi diantaranya :

- Laravel - The PHP Framework for Web Artisans
- JavaScript - JavaScript, often abbreviated as JS, is a programming language that is one of the core technologies of the World Wide Web, alongside HTML and CSS.
- Bootstrap - Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web development. 



## Installasi

Lakukan Clone Project/Unduh manual .

Aktifkan Xampp Control Panel, lalu akses ke http://localhost/phpmyadmin/.

Buat database dengan nama 'pos'.

Jika melakukan Clone Project, rename file .env.example dengan env dan hubungkan
database nya dengan mengisikan nama database, 'DB_DATABASE=pos'.


Kemudian, Ketik pada terminal :
```sh
php artisan migrate
```

Lalu ketik juga

```sh
php artisan migrate:fresh --seed
```

Jalankan aplikasi 

```sh
php artisan serve
```

Akses Aplikasi di Web browser 
```sh
127.0.0.1:8000
```

Demo Login :
1. Admin
    - email     : admin@gmail.com
    - password  : 1234


Demo Video : https://youtu.be/wY13QzFiipY?si=PE2Bx0N6XvA3q8de

![Screenshot_1139](https://github.com/dwipurnomo12/portal-desa/assets/105181667/269695e3-e79c-45ee-94a7-d3bd260e64a9)
![Screenshot_1138](https://github.com/dwipurnomo12/portal-desa/assets/105181667/17e3e13e-dbf9-463c-8d7a-d0ad42c5eb69)
![Screenshot_1137](https://github.com/dwipurnomo12/portal-desa/assets/105181667/ae1020f7-232f-4585-9c0d-9e7408c30271)
![Screenshot_1136](https://github.com/dwipurnomo12/portal-desa/assets/105181667/22bef1c0-1b78-41f8-a0ec-0fc88a2140e9)
![Screenshot_1135](https://github.com/dwipurnomo12/portal-desa/assets/105181667/eeeee1f4-6718-4973-ac1d-44478dedafd7)
![Screenshot_1134](https://github.com/dwipurnomo12/portal-desa/assets/105181667/e7bfc102-c141-4bcb-88cd-f54faa9a0dfc)
![Screenshot_1133](https://github.com/dwipurnomo12/portal-desa/assets/105181667/dbbe4d82-f58c-4d43-9625-f28fb4039613)

