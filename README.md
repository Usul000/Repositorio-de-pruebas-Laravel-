# 🚀 Laravel REST API

> Simple REST API with authentication (Laravel Sanctum) and full CRUD.

![Laravel](https://img.shields.io/badge/Laravel-11+-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![License](https://img.shields.io/badge/license-MIT-4ade80?style=flat-square)

---

## ✨ Features

- 🔐 Token-based authentication (Laravel Sanctum)
- 📦 Full CRUD for Items resource
- ✅ Form request validation
- 🛡️ Protected routes with middleware
- 📄 JSON responses with consistent structure

---

## ⚙️ Requirements

- PHP 8.2+
- Composer
- MySQL / PostgreSQL / SQLite

---

## 🛠️ Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/laravel-api.git
cd laravel-api

# 2. Install dependencies
composer install

# 3. Copy environment file and generate key
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
DB_CONNECTION=mysql
DB_DATABASE=laravel_api
DB_USERNAME=root
DB_PASSWORD=

# 5. Run migrations
php artisan migrate

# 6. Install Sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# 7. Start the server
php artisan serve
```

---

## 📡 API Endpoints

### Auth

| Method | Endpoint | Description |
|--------|----------|-------------|
| POST | `/api/register` | Register a new user |
| POST | `/api/login` | Login and get token |
| POST | `/api/logout` | Logout (revoke token) |
| GET | `/api/me` | Get authenticated user |

### Items (protected)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/items` | List all items |
| POST | `/api/items` | Create a new item |
| GET | `/api/items/{id}` | Get a single item |
| PUT | `/api/items/{id}` | Update an item |
| DELETE | `/api/items/{id}` | Delete an item |

---

## 🔑 Authentication

All `/api/items` routes require a Bearer token in the header:

```
Authorization: Bearer YOUR_TOKEN_HERE
```

---

## 📋 Request Examples

### Register
```json
POST /api/register
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

### Create Item
```json
POST /api/items
{
  "title": "My first item",
  "description": "Optional description",
  "status": "active"
}
```

---

## 📄 License

MIT © 2025
