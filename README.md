<h2 id="pre-requisite">💾 Prasyarat</h2>

<p>Berikut ini adalah prasyarat yang diperlukan untuk menginstal dan menjalankan aplikasi.</p>

-   PHP 8.2.8 & Web Server (Apache, Lighttpd, atau Nginx)
-   Database (MariaDB w/ v11.0.3)
-   Web Browser (Safari, Opera, atau Firefox)

<h2 id="installation">💻 Instalasi</h2>

<h3 id="develop-yourself">🏃‍♂️ Pengembangan</h3>
1. Clone repository

```bash
git clone https://github.com/alfianchii/dapegar
cd dapegar
composer install
npm install
cp .env.example .env
```

2. Konfigurasi database di file `.env`

```conf
APP_DEBUG=true
DB_DATABASE=dapegar
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

3. Migrasi dan symlink

```bash
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
```

4. Jalankan website

```bash
npm run dev
# Jalankan di terminal yang berbeda
php artisan serve
```

<h3 id="develop-docker">🐳 Pengembangan dengan Docker</h3>

-   Clone repository:

```bash
git clone https://github.com/alfianchii/dapegar
cd dapegar
```

-   Copy file `.env.example` dengan command `cp .env.example .env` dan konfigurasi database:

```conf
APP_DEBUG=true
DB_HOST=mariadb
DB_DATABASE=dapegar
DB_USERNAME=your-username
DB_PASSWORD=your-password
```

-   Pastikan kamu telah menginstal dan menjalankan Docker:

```bash
docker compose up --build -d
```

-   Instalasi dependencies:

```bash
docker compose run --rm composer install
docker compose run --rm npm install
```

-   Laravel setups:

```bash
docker compose run --rm laravel-setup
```

-   Jalankan secara local:

```bash
docker compose run --rm --service-ports npm run dev
```

-   Pages
-   -   App: `http://127.0.0.1`
-   -   PhpMyAdmin: `http://127.0.0.1:8888`

<h4 id="docker-commands">🔐 Commands</h4>

-   Composer
-   -   `docker-compose run --rm composer install`
-   -   `docker-compose run --rm composer require laravel/breeze --dev`
-   -   Dst

-   NPM
-   -   `docker-compose run --rm npm install`
-   -   `docker-compose run --rm --service-ports npm run dev`
-   -   Dst

-   Artisan
-   -   `docker-compose run --rm artisan serve`
-   -   `docker-compose run --rm artisan route:list`
-   -   Dst
