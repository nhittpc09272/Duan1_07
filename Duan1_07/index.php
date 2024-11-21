<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
// $dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', controllerMethod: 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');

// Chuyển đến trang Blog
Route::get('/blog', controllerMethod: 'App\Controllers\Client\BlogController@blog');

// Chuyển đến trang Contact
Route::get('/contact', controllerMethod: 'App\Controllers\Client\ContactController@contact');

// Chuyển đến trang About
Route::get('/about', controllerMethod: 'App\Controllers\Client\AboutController@about');

// Chuyển đến trang Checkout
Route::get('/checkout', controllerMethod: 'App\Controllers\Client\CheckoutController@checkout');

// Chuyển đến trang Order tracking
Route::get('/tracking', controllerMethod: 'App\Controllers\Client\TrackingController@tracking');

// Chuyển đến trang Order tracking
Route::get('/confirm', controllerMethod: 'App\Controllers\Client\ConfirmController@confirm');


// Chuyển đến trang Cart
Route::get('/cart', controllerMethod: 'App\Controllers\Client\CartController@cart');



// *** Admin

Route::get('/admin', 'App\Controllers\Admin\HomeController@index');

//  *** Category
// GET /categories (lấy danh sách loại sản phẩm)
Route::get('/admin/categories', 'App\Controllers\Admin\CategoryController@index');

// GET /categories/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/categories/create', 'App\Controllers\Admin\CategoryController@create');

// POST /categories (tạo mới một loại sản phẩm)
Route::post('/admin/categories', 'App\Controllers\Admin\CategoryController@store');

// GET /categories/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@edit');

// PUT /categories/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@update');

// DELETE /categories/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/categories/{id}', 'App\Controllers\Admin\CategoryController@delete');

// product
Route::get('/admin/products', 'App\Controllers\Admin\ProductController@index');
// GET /products/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/products/create', 'App\Controllers\Admin\ProductController@create');

// POST /products (tạo mới một loại sản phẩm)
Route::post('/admin/products', 'App\Controllers\Admin\ProductController@store');

// GET /products/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/products/{id}', 'App\Controllers\Admin\ProductController@edit');

// PUT /products/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/products/{id}', 'App\Controllers\Admin\ProductController@update');

// DELETE /products/{id} (delete loại sản phẩm với id cụ thể)
Route::delete('/admin/products/{id}', 'App\Controllers\Admin\ProductController@delete');



Route::dispatch($_SERVER['REQUEST_URI']);
