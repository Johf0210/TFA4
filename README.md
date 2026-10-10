# Complete Point of Sale System

This CodeIgniter 4 application implements the IT0049 midterm project requirements: protected staff authentication, product/customer/staff CRUD, safe image uploads, inventory-aware sales recording, and sales history.

## Local setup

This starter is pinned to CodeIgniter 4.4.8 because the provided XAMPP PHP runtime is PHP 8.0. Enable the `intl`, `sqlite3`, `pdo_sqlite`, and `fileinfo` extensions in `C:\xampp\php\php.ini` before running the web server.

```text
composer install
php spark migrate --all
php spark db:seed PosSeeder
php spark serve
```

The application is configured for the class XAMPP workflow: MySQL/MariaDB database `pos_system`, username `root`, and a blank password. Update `app/Config/Database.php` if your XAMPP MySQL credentials differ.

## Demo account

Username: `admin`  
Password: `password`

## Assignment mapping

- Module 1: routes, controllers, views, and MVC separation
- Module 2: CodeIgniter models, Query Builder, migrations, and seeder
- Module 3: validation, CSRF-protected forms, CRUD, randomized file names, and public uploads
- Module 4: hashed passwords, session login state, flash messages, logout, and `auth` route filter

The migration and seeder files are under `app/Database`, and the public document root is `public/`.
