# Titan Router
A simple and lightweight PHP router.
Built by Turan Karatuğ ([http://www.turankaratug.com](http://www.turankaratug.com))

## Features
- Supports `GET`, `POST`, `PUT`, `DELETE`, `OPTIONS`, `PATCH` and `HEAD` request methods
- Static Route Patterns
- Dynamic Route Patterns
- Easy-to-use patterns
- Allowance of `Class@Method` calls
- Before Route Middlewares
- Namespaces Supports
- Route Groups Supports
- Subdomain Supports
- Subfolder Supports
- Custom 404 Handling

## Installation
Installation is possible using Composer
```
composer require tkaratug/titan-router
```

## Usage
```php
require __DIR__ . '/vendor/autoload.php';

use Titan\Router\Router as Route;

Route::get('/', function(){
    echo 'Hello world!';
});

Route::execute();
```

Shorthands for single request methods are provided:
```php
Route::get('pattern', function() { /* ... */ });
Route::post('pattern', function() { /* ... */ });
Route::put('pattern', function() { /* ... */ });
Route::delete('pattern', function() { /* ... */ });
Route::options('pattern', function() { /* ... */ });
Route::patch('pattern', function() { /* ... */ });
```
Note: Routes must be hooked before `Route::execute()` is being called.

## `Class@Method` calls
We can route to the class action like so:
```php
Route::get('/profile', 'User@viewProfile'); // Without namespace
Route::get('/product/{num}', 'App\Controllers\Product@detail'); // With namespace
```

## Before Route Middlewares
```php
Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', function(){ /* ... */} );
});
```

## Namespaces Supports
```php
Route::namespace('backend')->group(function(){
    // Controllers Within The "Controllers\Backend" Namespace
});
```

## Subfolder Supports
```php
Route::prefix('admin')->group(function(){
    Route::get('users', function(){
        // Matches The "/admin/users" URL
    });
});
```

## Subdomain Supports
```php
Route::domain('api.example.com')->group(function(){
    Route::get('user/{num}', function($id){
        //
    });
});
```

## Multiple Groups
```php
Route::namespace('backend')->prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/', 'Dashboard@index');
    // Controller = Controllers\Backend\Dashboard
    // URL = /admin
    // Middleware = Auth
});
```

### Custom 404
Override the default 404 handler using `Route::set404(function);`
```php
Route::set404(function() {
    header('HTTP/1.1 404 Not Found');
    // ... do something special here
});
```
