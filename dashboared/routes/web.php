<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth' , 'isAdmin'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('category', [CategoryController::class, 'index']);
    Route::get('add-category', [CategoryController::class, 'create']);
    Route::post('add-category', [CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [CategoryController::class, 'update']);
    Route::get('delete-category/{category_id}', [CategoryController::class, 'delete']);

    Route::get('user', [UserController::class ,'index']);
    Route::get('add-user', [UserController::class ,'create']);
    Route::post('add-user', [UserController::class ,'store']);
    Route::get('edit-user/{user_id}', [UserController::class ,'edit']);
    Route::put('update-user/{user_id}', [UserController::class ,'update']);
    Route::delete('delete-user/{user_id}', [UserController::class, 'delete']);

    Route::get('product', [ProductController::class ,'index']);
    Route::get('add-product', [ProductController::class ,'create']);
    Route::post('add-product', [ProductController::class ,'store']);
    Route::get('edit-product/{product_id}', [ProductController::class ,'edit']);
    Route::put('update-product/{product_id}', [ProductController::class, 'update']);
    Route::get('delete-product/{product_id}', [ProductController::class, 'delete']);


});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
