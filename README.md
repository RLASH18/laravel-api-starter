<h1 align="center">🚀 Laravel API Starter</h1>

<p align="center">
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=flat&logo=laravel" alt="Laravel"></a>
  <a href="https://php.net"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat&logo=php" alt="PHP"></a>
  <a href="https://opensource.org/licenses/MIT"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="License"></a>
</p>

My first REST API project built while learning REST API development with Laravel. This demonstrates clean architecture with Service Layer pattern, API Resources, comprehensive validation, and standardized JSON responses.

## ✨ Features

- ✅ **RESTful API Architecture** - Clean and consistent API design following REST principles
- ✅ **Service Layer Pattern** - Business logic separated from controllers for better maintainability
- ✅ **API Resources** - Consistent data transformation and response formatting
- ✅ **Request Validation** - Form Request classes with custom validation rules and messages
- ✅ **Standardized Responses** - Unified JSON response structure using ApiResponse trait
- ✅ **API Versioning** - Built-in versioning support (v1) for backward compatibility
- ✅ **Laravel Sanctum** - Ready for API authentication
- ✅ **Clean Code** - PSR-12 coding standards with comprehensive PHPDoc comments

## 📋 Table of Contents

- [Requirements](#-requirements)
- [Installation](#-installation)
- [Project Structure](#-project-structure)
- [API Documentation](#-api-documentation)
- [Testing with Postman](#-testing-with-postman)
- [Architecture Overview](#-architecture-overview)
- [License](#-license)

## 🔧 Requirements

- PHP >= 8.2
- Composer
- SQLite (default) / MySQL / PostgreSQL
- Node.js & NPM (optional, for frontend assets)

## 📦 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/RLASH18/laravel-api-starter.git
   cd laravel-api-starter
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database**
   
   **SQLite (Default - Already configured!):**
   
   The project uses SQLite by default. The database file is already created at `database/database.sqlite`. No additional configuration needed!

   Your `.env` file should have:
   ```env
   DB_CONNECTION=sqlite
   ```

   **Alternative: MySQL/PostgreSQL**
   
   If you prefer MySQL or PostgreSQL, update your `.env` file:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── Api/
│   │       └── V1/
│   │           └── PostController.php    # API endpoints
│   ├── Requests/
│   │   └── Post/
│   │       ├── StorePostRequest.php      # Create validation
│   │       └── UpdatePostRequest.php     # Update validation
│   └── Resources/
│       └── PostResource.php              # Response transformation
├── Models/
│   └── Post.php                          # Eloquent model
├── Services/
│   └── PostService.php                   # Business logic layer
└── Traits/
    └── ApiResponse.php                   # Standardized JSON responses
```

## 📚 API Documentation

### Base URL
```
http://localhost:8000/api/v1
```

### Response Format

All API responses follow this standardized structure:

**Success Response:**
```json
{
  "success": true,
  "message": "Success message",
  "data": { ... }
}
```

**Error Response:**
```json
{
  "success": false,
  "message": "Error message",
  "data": null
}
```

### Endpoints

#### 1. Get All Posts
```http
GET /api/v1/posts
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Success",
  "data": [
    {
      "id": 1,
      "title": "My First Post",
      "description": "This is a sample post",
      "created_at": "2024-12-19 16:30:00",
      "updated_at": "2024-12-19 16:30:00"
    }
  ]
}
```

---

#### 2. Create a Post
```http
POST /api/v1/posts
```

**Request Body:**
```json
{
  "title": "My New Post",
  "description": "This is the post description"
}
```

**Validation Rules:**
- `title`: required, string, max 255 characters
- `description`: optional, string, max 255 characters

**Response (201 Created):**
```json
{
  "success": true,
  "message": "Post created successfully",
  "data": {
    "id": 2,
    "title": "My New Post",
    "description": "This is the post description",
    "created_at": "2024-12-19 16:35:00",
    "updated_at": "2024-12-19 16:35:00"
  }
}
```

**Validation Error (422 Unprocessable Entity):**
```json
{
  "message": "The post title is required.",
  "errors": {
    "title": [
      "The post title is required."
    ]
  }
}
```

---

#### 3. Get Single Post
```http
GET /api/v1/posts/{id}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Success",
  "data": {
    "id": 1,
    "title": "My First Post",
    "description": "This is a sample post",
    "created_at": "2024-12-19 16:30:00",
    "updated_at": "2024-12-19 16:30:00"
  }
}
```

**Not Found (404):**
```json
{
  "success": false,
  "message": "Post not found",
  "data": null
}
```

---

#### 4. Update a Post
```http
PUT /api/v1/posts/{id}
PATCH /api/v1/posts/{id}
```

**Request Body:**
```json
{
  "title": "Updated Post Title",
  "description": "Updated description"
}
```

**Response (200 OK):**
```json
{
  "success": true,
  "message": "Post updated successfully",
  "data": {
    "id": 1,
    "title": "Updated Post Title",
    "description": "Updated description",
    "created_at": "2024-12-19 16:30:00",
    "updated_at": "2024-12-19 16:40:00"
  }
}
```

---

#### 5. Delete a Post
```http
DELETE /api/v1/posts/{id}
```

**Response (204 No Content):**
```json
{
  "success": true,
  "message": "Post deleted successfully",
  "data": null
}
```

## 🧪 Testing with Postman

### Quick Setup

1. **Import Collection** (Optional: Create a Postman collection)
2. **Set Base URL Variable**
   - Variable: `base_url`
   - Value: `http://localhost:8000/api/v1`

### Example Requests

#### Create a Post
```
Method: POST
URL: {{base_url}}/posts
Headers:
  Content-Type: application/json
  Accept: application/json

Body (raw JSON):
{
  "title": "Learning Laravel APIs",
  "description": "Building my first REST API with Laravel"
}
```

#### Get All Posts
```
Method: GET
URL: {{base_url}}/posts
Headers:
  Accept: application/json
```

#### Get Single Post
```
Method: GET
URL: {{base_url}}/posts/1
Headers:
  Accept: application/json
```

#### Update a Post
```
Method: PUT
URL: {{base_url}}/posts/1
Headers:
  Content-Type: application/json
  Accept: application/json

Body (raw JSON):
{
  "title": "Updated Title",
  "description": "Updated description"
}
```

#### Delete a Post
```
Method: DELETE
URL: {{base_url}}/posts/1
Headers:
  Accept: application/json
```

### Testing Tips

- Always include `Accept: application/json` header for proper JSON responses
- Use `Content-Type: application/json` when sending JSON data
- Test validation by sending invalid data (e.g., empty title)
- Test error handling by requesting non-existent resources

## 🏗️ Architecture Overview

### Service Layer Pattern

This project implements the **Service Layer Pattern** to separate business logic from controllers:

```php
Controller → Service → Model → Database
```

**Benefits:**
- ✅ Controllers stay thin and focused on HTTP concerns
- ✅ Business logic is reusable across different parts of the application
- ✅ Easier to test and maintain
- ✅ Better separation of concerns

### API Resources

Laravel API Resources provide a transformation layer between your Eloquent models and JSON responses:

```php
// PostResource.php
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'title' => $this->title,
        'description' => $this->description,
        'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
    ];
}
```

### Request Validation

Form Request classes handle validation logic:

```php
// StorePostRequest.php
public function rules(): array
{
    return [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:255'
    ];
}
```

### Standardized Responses

The `ApiResponse` trait provides consistent response methods:

- `success()` - 200 OK
- `created()` - 201 Created
- `deleted()` - 204 No Content
- `notFound()` - 404 Not Found
- `error()` - Custom error responses


## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

<p align="center">
  <strong>Built while learning REST API development with Laravel</strong>
</p>

<p align="center">
  <sub>📚 A learning journey into Laravel REST APIs • Service Layer Pattern • Clean Architecture</sub>
</p>
