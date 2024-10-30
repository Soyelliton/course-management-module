# Laravel Course Management Module

## Overview
This is a Laravel application featuring a course management system with role-based access control. Admin users can create, edit, and delete courses, as well as assign instructors. Regular users can view available courses.

## Features
- Role-based authentication using Laravel Breeze.
- Admin users can manage courses and assign instructors.
- Instructors can be assigned to multiple courses.
- Users can view courses and their details.

## Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL or another compatible database
- Node.js and npm (for frontend assets)

## Project Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/shikhaghosh/course-management-module.git
   cd course-management-module
2. **Install PHP dependencies:**
   ```bash
   composer install
3. **Install JavaScript dependencies:**
   ```bash
   npm install && npm run dev
4. **Environment Configuration:**
   - Copy the .env.example file to create a .env file.
   - Set your database credentials in the .env file:
   ```bash
   DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
5. **Generate Application Key:**
   ```bash
   php artisan key:generate
6. **Run Migrations and Seeders:**
- This command will create the necessary database tables and insert default data.
    ```bash
    php artisan migrate --seed
7. **Start the development server:**
    ```bash
    php artisan serve
8. **Access the Application:**Open your browser and navigate to:
    ```bash
    http://localhost:8000
## User Roles
- **Admin:** Can create, edit, and delete courses, as well as assign instructors.
- **User:** Can view courses and details.

## Course Management (Admin Only)

Admins can manage courses through the following routes:

- View all courses: /courses
- Create a new course: /courses/create
- Edit a course: /courses/{id}/edit
- Delete a course: /courses/{id}/delete

## Instructor Assignment (Admin Only)
Admins can view all user orders and their details through the following routes:

- Instructors can be assigned to courses during course creation or editing.
- Instructors are assigned using a multi-select dropdown in the course form.
## Database Migrations
The following tables are used in the project:

- **users:** Stores user information, including roles (Admin or User).
- **courses:** Stores course details such as title and description.
- **instructors:** Stores instructor details including name and email.
- **course_instructor:** Pivot table storing the many-to-many relationship between courses and instructors.

    To run the migrations manually, use:
    ```bash
    php artisan migrate

## Seeders
By running php artisan migrate --seed, some default data will be inserted:

- An admin user for testing (email: admin@gmail.com, password: 12345678)
- Sample courses and instructors.

## Testing and Debugging
- Use the Laravel Tinker tool for testing database queries:
    ```bash
    php artisan tinker
- For viewing logs, use:
    ```bash
    tail -f storage/logs/laravel.log
