# ClickShare E-Commerce Product Management Feature Application

This is ClickShare E-Commerce product management application built with **Laravel 11**. It provides a REST API and web interface to manage products. User registration and login functionality using Laravel's built-in authentication system implemented. Implmented a JavaScript feature to consume the products API with Authentication and Pagination to display them. API Token-based Authentication implemented using Sanctum package. Both client-side & server-side validation implemented.


## Technical Features

This appliction features API Resource classes, Resource Collection classes, Factories & Seeders, Repository & Service Design Patterns, Form Request classes, API Versioning, and API Documentation using L5 Swagger package.
API endpoints tested using Postman.


## Installation Instructions

Follow the steps below to set up and run the application locally.


### Steps to Install

1. **Clone the repository**:
    ```bash
    git clone https://github.com/AhmedYahyaE/clickshare-e-commerce-product-management-feature.git
    cd clickshare-e-commerce-product-management-feature
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

4. **Generate the application key**:  
    This step generates a unique application key for encryption:  
    ```bash
    php artisan key:generate
    ```

5. **Configure the database**:
    Open the `.env` file and set your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6. **Migrate the database**:
    Run the migrations to create the necessary tables:
    ```bash
    php artisan migrate
    ```

7. **Seed the database**:
    ```bash
    php artisan db:seed
    ```

8. **Install frontend dependencies**:
    ```bash
    npm install
    ```

9. **Build Vite assets** (for frontend):
    ```bash
    npm run build
    ```

10. **Start the Laravel development server**:
    ```bash
    php artisan serve
    ```

Now, your application should be running locally at `http://localhost:8000`. To experiment with the application, you can either register a new user, or use the following existing user credentials: Email: ahmed.yahya@example-email.com, Password: 123456

## Products API Documentation:

You can access this applications API Documentation using L5 Swagger running locally on `http://localhost:8000/api/documentation`.

Note 1: Make sure to include the "Accept: application/json" Header with all your requests.

Note 2: To accesss the GET /api/v1/products API endpoint, you must send the 'Authorization' Header with your HTTP request with the value you received from the POST /api/authenticate endpoint.

Check my Postman Collection of the API on: https://web.postman.co/workspace/My-Public-Portfolio-Postman-Wor~1b5d7508-dbfc-423a-91f3-8f14b2a483d5/collection/28181483-9186a5fb-1e0a-4edd-8bc0-3d7d1bbf7070
