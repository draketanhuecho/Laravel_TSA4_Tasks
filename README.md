# Laravel POS System (IT0049 - TFA7)

## Setup & Installation Instructions
1. Clone the repository:
   `git clone https://github.com/draketanhuecho/Laravel_TFA5.git`
2. Install PHP dependencies:
   `composer install`
3. Copy environment configuration and generate app key:
   `cp .env.example .env`
   `php artisan key:generate`
4. Configure database credentials in `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and run migrations with seeders:
   `php artisan migrate --seed`
5. Create the public storage symbolic link for user avatars:
   `php artisan storage:link`
6. Run the local development server:
   `php artisan serve`