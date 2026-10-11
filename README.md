<<<<<<< HEAD
# Tasks for Today Management System

A small task-management web app built with **CodeIgniter 4**, PHP and MySQL.
Made for IT0049 (Web System Technologies) - Technical Summative Assessment 1.

**Live demo:** PASTE YOUR INFINITYFREE LINK HERE

## Pages

| URL         | What it shows                                  |
|-------------|------------------------------------------------|
| `/`         | Welcome page - only the tasks dated today      |
| `/tasks`    | Task List page - every task, ordered by date   |
| `/profile`  | Profile page - the single demo user            |
| `/about`    | About page - the developer of the system       |

## Requirements

- PHP 8.2 or higher (with the `intl`, `mbstring` and `mysqli` extensions)
- Composer
- MySQL / MariaDB (MAMP, XAMPP, etc.)

## Setup

1. Clone the repository and install the dependencies:
   ```
   git clone YOUR-REPO-URL tasks-today
   cd tasks-today
   composer install
   ```
2. Create the settings file and edit the database values:
   ```
   cp env .env
   ```
   Set `app.baseURL` and the `database.default.*` lines in `.env`.
3. Create an empty database named `tasks_today_db` (for example in phpMyAdmin).
4. Create the tables and add the sample data. Choose **one** of these:
   - **Option A - migrations and seeders:**
     ```
     php spark migrate
     php spark db:seed TaskSeeder
     php spark db:seed UserSeeder
     ```
   - **Option B - SQL export:** import `database/tasks_today_db.sql` in phpMyAdmin.
5. Start the app:
   ```
   php spark serve
   ```
   Then open http://localhost:8080

> The sample tasks are dated relative to the day the seeder runs, so the Welcome page
> shows tasks. Run `php spark db:seed TaskSeeder` again any day to refresh the dates.

## Database

- `tasks` - id, title, status, task_date, created_at (10 sample records on 4 dates)
- `users` - id, username, full_name, email, created_at (1 demo record)

## Project structure

```
app/Controllers   Home, Tasks, Profile, About
app/Models        TaskModel, UserModel
app/Views         layout, home, tasks, profile, about
app/Database      Migrations and Seeds
app/Config        Routes.php
database/         SQL export
```

## Developer

ARIS MATTHEW PETRAS - TB32
=======
# tasks-today
[TECHNICAL] [AI-PROHIBITED] Technical Summative Assessment 1: Module 1 and Module 2
>>>>>>> d80bb47ebcc3dd97175c9a978905330f3d615960
