Portfolio Website – Laravel
A Laravel-based portfolio website that includes user authentication and Tailwind CSS integration.

📦 Installation Steps
1. Clone the Repository
Clone this repository to your local machine and navigate into the project directory:

bash
git clone https://github.com/YOUR_USERNAME/portfolio-website.git
cd portfolio-website
2. Install Dependencies
Install Laravel and Node package dependencies:

bash
composer install
npm install
3. Environment Configuration
Copy the example environment file and set up your database configuration:

bash
cp .env.example .env
Update the .env file with your database credentials:

bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
Then generate the application key:

bash
php artisan key:generate
4. Database Setup
Create a MySQL database named portfolio_db.

Run migrations to set up the database tables:

bash
php artisan migrate
5. Install Laravel Breeze (Authentication)
Install Laravel Breeze for authentication scaffolding:

bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
6. Install Tailwind CSS
Set up Tailwind CSS with PostCSS and Autoprefixer:

bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init
Configure tailwind.config.js and add Tailwind directives in resources/css/app.css.

7. Start Development Server
Run the Laravel development server:

bash
php artisan serve
📚 Features
Laravel 11

Laravel Breeze Authentication

Tailwind CSS

MySQL Integration

🙋‍♂️ Author
Your Name – @yourhandle
