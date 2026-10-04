# Inventory Tracker

A simple inventory management system built with Laravel, MySQL, and Bootstrap.

## Features

* Product management
* Category management
* Supplier management
* Stock in and stock out
* Stock movement history
* Low stock detection
* Product validation

## Tech Stack

* Laravel
* PHP
* MySQL
* Bootstrap 5
* Blade

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/aye2-win/inventory_tracker.git
```

### 2. Go to the project folder

```bash
cd inventory-tracker
```

### 3. Install dependencies

```bash
composer install
npm install
```

### 4. Create `.env`

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Setup database

Create a MySQL database and update your `.env` file:

```env
DB_DATABASE=inventory_tracker
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run migrations

```bash
php artisan migrate
```

### 7. Start the project

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## Main Pages

| Page | Description |
| --- | --- |
| Products | View all products |
| Add Product | Add a new product |
| Edit Product | Update product information |
| Product Details | View product details |
| Stock Management | Add or remove stock |

## Stock Management

The system supports:

* Stock in
* Stock out
* Stock movement history
* Low stock detection
* Stock quantity updates

Stock cannot be removed when there is not enough quantity.

## Testing

Test the application through the browser.

You can add products, manage stock, and check stock movements.

## License

This project is for learning and practice purposes.

**Hope you enjoy this project ✨**