<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\AdminController;
// use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\fronthand\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/',[FrontController::class , 'index']);
// Route::get('/about',[FrontController::class , 'about']);
// Route::get('/', [AdminController::class, 'login'])->name('login');
// Route::post('/login', [AdminController::class, 'authenticate'])->name('userlogin');
// Route::group(['prefix' => 'admin'], function () {
//     Route::group(['middleware' => 'auth:web'], function () {
//         Route::get('/dashboard', [AdminController::class, 'index']);
//         Route::get('/user', [UserController::class, 'index']);
//         Route::get('/user/create', [UserController::class, 'create']);
//         Route::post('/user/submit', [UserController::class, 'submit']);
//         Route::get('/delete-user/{id}', [UserController::class, 'delete']);
//         Route::get('/category', [CategoryController::class, 'index']);
//     });
// });

Route::get('/', [AdminController::class, 'login']);
Route::get('/category-detail/{id}', [HomeController::class, 'category_detail']);
Route::get('/admin/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('userlogin');
Route::group(['middleware' => 'auth:web'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/dashboard', [AdminController::class, 'index']);
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/create', [UserController::class, 'create']);
        Route::post('/user/submit', [UserController::class, 'submit']);
        Route::get('/user-edit/{id}', [UserController::class, 'edit']);
        Route::post('/user-update/{id}', [UserController::class, 'update']);
        Route::get('/logout', [UserController::class, 'logout']);
        Route::get('/category', [CategoryController::class, 'index']);
        Route::get('/products', [ProductsController::class, 'index'])->name('admin.products');
        Route::match(['get','post'] , '/create-products', [ProductsController::class, 'create'])->name('admin.products.create');
        Route::get('/delete-product/{id}', [ProductsController::class, 'Destroy'])->name('admin.products.delete');
    });
});
