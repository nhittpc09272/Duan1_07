<?php
session_start();
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
ini_set('log_errors', TRUE); 
ini_set('error_log', './logs/php/php-errors.log');

use App\Route;

require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'config.php';



// *** Client
Route::get('/', controllerMethod: 'App\Controllers\Client\HomeController@index');
Route::get('/products', 'App\Controllers\Client\ProductController@index');
Route::get('/products/{id}', 'App\Controllers\Client\ProductController@detail');
Route::get('/products/categories/{id}', 'App\Controllers\Client\ProductController@getProductByCategory');

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
Route::get('/cart', 'App\Controllers\Client\CartController@index');
Route::post('/cart/add', 'App\Controllers\Client\CartController@add');
Route::put('/cart/update', 'App\Controllers\Client\CartController@update');
Route::delete('/cart/delete', 'App\Controllers\Client\CartController@deleteItem');
Route::delete('/cart/delete-all', 'App\Controllers\Client\CartController@deleteAll');

//comment 
Route::post('/comments', 'App\Controllers\Client\CommentController@store');
Route::put('/comments/{id}', 'App\Controllers\Client\CommentController@update');
Route::delete('/comments/{id}', 'App\Controllers\Client\CommentController@delete');


// Chuyển đến trang Login
// Route::get('/login', controllerMethod: 'App\Controllers\Client\AccountController@login');

// Chuyển đến trang Register
// Route::get('/register', controllerMethod: 'App\Controllers\Client\AccountController@register');

//register
Route::get('/register', 'App\Controllers\Client\AuthController@register');
Route::post('/register', 'App\Controllers\Client\AuthController@registerAction');
//login
Route::get('/login', 'App\Controllers\Client\AuthController@login');
Route::post('/login', 'App\Controllers\Client\AuthController@loginAction');

//logout
Route::get('/logout', 'App\Controllers\Client\AuthController@logout');
//users
Route::get('/users/{id}', 'App\Controllers\Client\AuthController@edit');
Route::put('/users/{id}', 'App\Controllers\Client\AuthController@update');
//change password
Route::get('/change-password', 'App\Controllers\Client\AuthController@changePassword');
Route::put('/change-password', 'App\Controllers\Client\AuthController@changePasswordAction');
//forgot password
Route::get('/forgot-password', 'App\Controllers\Client\AuthController@forgotPassword');
Route::post('/forgot-password', 'App\Controllers\Client\AuthController@forgotPasswordAction');
//reset password
Route::get('/reset-password', 'App\Controllers\Client\AuthController@resetPassword');
Route::put('/reset-password', 'App\Controllers\Client\AuthController@resetPasswordAction');


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

// variant
Route::get('/admin/variants', 'App\Controllers\Admin\VariantController@index');
// GET /variant/create (hiển thị form thêm loại sản phẩm)
Route::get('/admin/variants/create', 'App\Controllers\Admin\VariantController@create');

// POST /variant (tạo mới một loại sản phẩm)
Route::post('/admin/variants', 'App\Controllers\Admin\VariantController@store');

// GET /variant/{id} (lấy chi tiết loại sản phẩm với id cụ thể)
Route::get('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@edit');

// PUT /variant/{id} (update loại sản phẩm với id cụ thể)
Route::put('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@update');

// Đảm bảo rằng định nghĩa route DELETE có mặt trong file routes.php
Route::delete('/admin/variants/{id}', 'App\Controllers\Admin\VariantController@delete');

//  *** User
// GET /user (lấy danh sách người dùng)
Route::get('/admin/users', 'App\Controllers\Admin\UserController@index');

// GET /user/create (hiển thị form thêm người dùng)
Route::get('/admin/users/create', 'App\Controllers\Admin\UserController@create');

// POST /user (tạo mới một người dùng)
Route::post('/admin/users', 'App\Controllers\Admin\UserController@store');

// GET /user/{id} (lấy chi tiết người dùng với id cụ thể)
Route::get('/admin/users/{id}', 'App\Controllers\Admin\UserController@edit');

// PUT /user/{id} (update người dùng với id cụ thể)
Route::put('/admin/users/{id}', 'App\Controllers\Admin\UserController@update');

// DELETE /user/{id} (delete người dùng với id cụ thể)
Route::delete('/admin/users/{id}', 'App\Controllers\Admin\UserController@delete');



Route::dispatch($_SERVER['REQUEST_URI']);
