# ClickShare E-Commerce Product Management Feature Application

This is ClickShare E-Commerce product management application built with **Laravel 11**. It provides an API and web interface to manage products.


## Technical Features

This appliction features API Resource classes, Resource Collection classes, Factories & Seeders, Repository & Service Design Patterns, Form Request classes, API Versioning, and API Documentation using L5 Swagger package.
API endpoints tested using Postman.


## Installation Instructions

Follow the steps below to set up and run the application locally.


### Steps to Install

1. **Clone the repository**:
    ```bash
    git clone https://github.com/AhmedYahyaE/clickshare-e-commerce-product-management-feature.git
    cd clickshare-e-commerce-product-management-feature-main
    ```

2. **Install dependencies**:
    ```bash
    composer install
    ```

3. **Set up the environment file**:
    Copy `.env.example` to `.env`:
    ```bash
    cp .env.example .env
    ```

4. **Configure the database**:
    Open the `.env` file and set your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

5. **Migrate the database**:
    Run the migrations to create the necessary tables:
    ```bash
    php artisan migrate
    ```

6. **Seed the database**:
    ```bash
    php artisan db:seed
    ```

7. **Install frontend dependencies**:
    ```bash
    npm install
    ```

8. **Build Vite assets** (for frontend):
    ```bash
    npm run build
    ```

9. **Start the Laravel development server**:
    ```bash
    php artisan serve
    ```

Now, your application should be running locally at `http://localhost:8000`. To experiment with the application, you can either register a new user, or use the following existing user credentials: Emai: ahmed.yahya@example-email.com, Password: 123456

## Products API Documentation:

You can access this applications API Documentation using L5 Swagger running locally on `http://localhost:8000/api/documentation`.
Note:
