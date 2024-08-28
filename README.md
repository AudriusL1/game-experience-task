# TutoTOONS Game Feedback API

## Project Setup Backend part

### Before you begin please make sure you have the following installed:
- PHP 8.0+ (compatible with Laravel 10)
- Composer
- Docker (for Laravel Sail)

### Installation

1. **Clone the repository**

2. **Install PHP dependencies using Composer:**
   ```bash
   composer install
   ```
   
3. **Set up environment variables:**
    - Copy the `.env.example` to `.env`:
    - Update `.env` with your database credentials and security token.

4. **Start the Laravel development server:**
    - Using Laravel Sail:
      ```bash
      ./vendor/bin/sail up -d
      ```

5. **Start the Laravel development server:**
   - Access the Sail shell:
     ```bash
     ./vendor/bin/sail shell
     ```
    
6. **Run migrations and seed the database:**
   ```bash
   php artisan migrate --seed
   ```

6. **Exit the Sail shell**
   ```bash
   exit
   ```

6. **Exit the Sail shell**
   ```bash
   exit
   ```
