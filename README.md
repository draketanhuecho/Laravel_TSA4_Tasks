# Laravel POS Application (IT0049 - TFA7)

## Features Implemented
- Create and Edit Customer accounts with validation and `old()` input preservation.
- Create and Edit User accounts with unique username validation.
- User avatar upload with image validation (max 2MB), Intervention Image resizing, and `Storage::disk('public')` storage.

## Setup & Installation
1. Clone the repository:
   `git clone https://github.com/draketanhuecho/Laravel_TFA5.git`
2. Install dependencies:
   `composer install`
3. Set up environment file and app key:
   `cp .env.example .env`
   `php artisan key:generate`
4. Configure your database in `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and run migrations with seeders:
   `php artisan migrate --seed`
5. Link the public storage directory:
   `php artisan storage:link`
6. Start the development server:
   `php artisan serve`