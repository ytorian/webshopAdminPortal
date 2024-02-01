<?php

use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index')->middleware('isAdmin');

//Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
//Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
//Route::get('/products/{product:id}/edit', [ProductsController::class, 'edit'])->name('products.edit');
//Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
//Route::get('/products/{product:id}', [ProductsController::class, 'show'])->name('products.show');
//Route::put('/products/{product:id}', [ProductsController::class, 'update'])->name('products.update');
// Below replaces all above.
Route::resource('products', ProductsController::class)->middleware('isAdmin');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('isNotLoggedIn');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::resource('categories', CatagoriesController::class)->middleware('isAdmin');
