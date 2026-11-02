About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

Simple, fast routing engine.

Powerful dependency injection container.

Multiple back-ends for session and cache storage.

Expressive, intuitive database ORM.

Database agnostic schema migrations.

Robust background job processing.

Real-time event broadcasting.

Laravel is accessible, powerful, and provides tools required for large, robust applications.

Installation & Setup

Ikuti langkah-langkah berikut untuk menjalankan project ini di environment lokal:

1. Prasyarat (Prerequisites)

Pastikan perangkat Anda sudah terinstal:

PHP >= 8.2

Composer

Node.js & NPM

Database (MySQL / PostgreSQL / SQLite)

2. Clone Repository

git clone https://github.com/username/nama-repo.git
cd nama-repo


3. Instalasi Dependensi

Instal paket backend (PHP) dan frontend (Node):

composer install
npm install


4. Konfigurasi Environment

Salin file .env.example menjadi .env dan buat application key:

cp .env.example .env
php artisan key:generate


Catatan: Sesuaikan konfigurasi database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di dalam file .env.

5. Migrasi Database

Jalankan migrasi dan seeder (jika ada) untuk membuat tabel database:

php artisan migrate --seed


6. Menjalankan Aplikasi

Jalankan server lokal dan compiler asset Vite:

# Jalankan secara bersamaan (Laravel versi terbaru)
composer run dev

# Atau jalankan di dua terminal terpisah:
php artisan serve
npm run dev


Aplikasi kini dapat diakses melalui http://localhost:8000.

Agentic Development (Laravel Boost)

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install Laravel Boost to supercharge your AI workflow:

Instal paket Laravel Boost (Dev Dependency):

composer require laravel/boost --dev


Jalankan installer Boost:

php artisan boost:install


Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

Learning Laravel

Documentation: Laravel has the most extensive and thorough documentation and video tutorial library of all modern web application frameworks.

Laracasts: Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript.

Laravel Learn: Watch bite-sized lessons with real-world projects on Laravel Learn to build an application from scratch while learning PHP fundamentals.

Contributing & Community

Contributing: Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the Laravel documentation.

Code of Conduct: In order to ensure that the Laravel community is welcoming to all, please review and abide by the Code of Conduct.

Security Vulnerabilities: If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via taylor@laravel.com. All security vulnerabilities will be promptly addressed.

License

The Laravel framework is open-sourced software licensed under the MIT license.
