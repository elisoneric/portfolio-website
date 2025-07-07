# 3LI Portfolio Website – Laravel

A Laravel-based portfolio website for 3LI by 3LI

---

## 📦 Installation Steps

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/portfolio-website.git
cd portfolio-website
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Configuration

```bash
cp .env.example .env
```

Update the `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

Generate the application key:

```bash
php artisan key:generate
```

### 4. Database Setup

Create a MySQL database named `portfolio_db`, then run migrations:

```bash
php artisan migrate
```

### 5. Install Laravel Breeze (Authentication)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
```

### 6. Install Tailwind CSS

```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init
```

Be sure to configure `tailwind.config.js` and add Tailwind directives in `resources/css/app.css`.

### 7. Start Development Server

```bash
php artisan serve
```

---

## 📚 Features

- Laravel 11  
- Laravel Breeze Authentication  
- Tailwind CSS  
- MySQL Integration  

---

## 🙋‍♂️ Author

Your Name – [@elisoneric](https://github.com/elisoneric)
