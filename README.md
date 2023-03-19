<br />
<div id="readme-top" align="center">
  <a href="https://github.com/mohammadrafly/SIPJP">
    <img src="images/logo-project.png" alt="Logo" width="120" height="80">
  </a>

<h3 align="center">Sistem Informasi Pemesanan Jasa Penggilingan</h3>

  <p align="center">
    Sistem informasi pemesanan yang digunakan untuk mempermudahkan distribusi jasa.
    <br />
  </p>
</div>

### Built With

* CI4

### Prerequisites

Penting! install bahan dibawah ini:
* composer
* phpmyadmin (xampp,laragon)
* php-8+
* php-ext: mbstring & intl
* terminal/cmd (administrator/root)

### Installation

* Install Dependencies |
  Jika terjadi error, hapus composer.lock terlebih dahulu
   ```sh
   composer install
   ```
* Create Database
   ```sh
   php spark db:create sipjp
   ```
* Migrate Database or Refresh
   ```sh
   php spark migrate
   ```
   ```sh
   php spark migrate:refresh
   ```
* Seeding Database:table Superadmin
   ```sh
   php spark db:seed Superadmin
   ```
   username: superadmin
   password: superadmin
* Run App
   ```sh
   php spark serve
   ```