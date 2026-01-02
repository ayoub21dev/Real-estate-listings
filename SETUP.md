# Project Setup Guide

Follow these steps to set up the Real Estate Listings project on a new machine.

## Prerequisites
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL (or SQLite)

## Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository_url>
   cd Real-estate-listings
   ```

2. **Install Backend Dependencies**
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   ```
   *Edit `.env` and set your database credentials (DB_DATABASE, DB_USERNAME, etc.)*

5. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

6. **Setup Database & Content (The Magic Command)**
   This single command will:
   - Create all database tables (migrations)
   - Create categories
   - **Import properties from the CSV file**
   - Download and assign images to properties
   ```bash
   php artisan migrate:fresh --seed
   ```

7. **Build Assets**
   ```bash
   npm run build
   ```

8. **Start the Server**
   ```bash
   php artisan serve
   ```

## Troubleshooting
- **Images not showing?** Run `php artisan db:seed --class=PropertyImageSeeder`
- **Missing Properties?** Ensure `storage/app/data/properties.csv` exists.
