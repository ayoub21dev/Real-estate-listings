# ImmoAnnonces - Real Estate Listings Platform

Modern, production-ready real estate platform for buying, renting, and selling properties. Built with **Laravel 12**, **PHP 8.3+**, **Tailwind CSS 3+**, and MySQL.

## Features

- Public frontend: Home, Buy, Rent, Listings, Property detail, Sell, About, Contact, Login/Register
- Responsive design (mobile-first) with Tailwind CSS
- Full admin dashboard for managing properties, users, and agents
- Property types: Sale / Rent
- Advanced search & filters
- Image gallery per property
- Agent contact forms
- Secure authentication (Laravel Sanctum + built-in auth scaffolding)

## Tech Stack 

- **Backend**: Laravel 12 (PHP 8.3+)
- **Frontend**: Blade templates + Tailwind CSS (via Laravel Breeze + Vite)
- **Database**: MySQL 8+
- **Authentication**: Laravel Breeze (Blade + Tailwind)
- **Asset Build**: Vite
- **Admin Panel**: Filament PHP 3

## Prerequisites

- PHP 8.3+
- Composer 2
- Node.js 20+ & npm
- MySQL 8+

## Installation

```bash
git clone https://github.com/ayoub21dev/Real-estate-listings.git
cd Real-estate-listings

composer install --optimize-autoloader --no-dev
npm install
npm run build

cp .env.example .env
php artisan key:generate

# Configure .env (DB_CONNECTION=mysql, DB_HOST, DB_DATABASE, etc.)

php artisan migrate --seed
php artisan storage:link
```

## Development

```bash
npm run dev          # Vite dev server (hot reload)
php artisan serve    # Laravel dev server
```

## Production Build

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
