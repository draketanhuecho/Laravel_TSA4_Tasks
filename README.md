# Tasks for Today Management System (IT0049 - TSA4)

## Features Implemented
- **Task CRUD & Soft Delete:** Create, view, edit/update, and soft-delete (`is_archived`) tasks with request validation and `old()` input preservation.
- **Selective Route Protection (Laravel Breeze):** Public access to Welcome (`/`), Task List (`/tasks`), Profile (`/profile`), and About (`/about`); creating, editing, updating, and archiving tasks require authentication.
- **Automatic Email Notification:** Uses Laravel's `Mail` facade and `TaskCompletedMail` Mailable to send a notification when a task's status changes to `done` (preventing duplicate emails if the task was already marked `done`).

## Setup & Installation Instructions
1. Clone the repository and enter the project folder:
   `git clone <your-tsa4-repo-url>`
   `cd <project-folder>`
2. Install PHP dependencies:
   `composer install`
3. Copy the environment file and generate the application key:
   `cp .env.example .env`
   `php artisan key:generate`
4. Configure your MySQL database (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) and mail settings in `.env`:
   ```env
   MAIL_MAILER=log
   MAIL_FROM_ADDRESS="noreply@tasksfortoday.test"
   MAIL_FROM_NAME="Tasks for Today"
   TASK_NOTIFICATION_EMAIL="admin@tasksfortoday.test"