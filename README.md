# Laravel POS Application (IT0049 - TFA8)

## Features Implemented
- **Customer & User Management (Resource Controllers):** Full CRUD operations (`index`, `create`, `store`, `show`, `edit`, `update`, `destroy`) using `Route::resource()`.
- **Validation & Avatar Upload:** Form validation with `old()` input preservation and profile picture upload/resizing via Intervention Image (`Storage::disk('public')`).
- **Authentication & Route Protection:** Login and registration powered by Laravel Breeze, with `auth` middleware restricting access to `/customers` and `/users`.

## Setup & Installation Instructions
1. Clone the repository:
   `git clone https://github.com/draketanhuecho/Laravel_TFA5.git`
2. Navigate to the project folder and install PHP dependencies:
   `cd Laravel_TFA5`
   `composer install`
3. Copy the environment configuration file and generate the application key:
   `cp .env.example .env`
   `php artisan key:generate`
4. Configure your MySQL database credentials in `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and run migrations with seeders:
   `php artisan migrate --seed`
5. Create the symbolic link for uploaded user avatars:
   `php artisan storage:link`
6. Start the local development server:
   `php artisan serve`
7. Access the app at `http://127.0.0.1:8000` (register a new account via `/register` or log in via `/login`).