<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

// Route::get('/products', function () {
//     return view('welcome');
// });
// Route::resource('products', Controller::class);
Route::get('/products_index', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products_store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products_destroy/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products_show/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products_edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products_update/{id}', [ProductController::class, 'update'])->name('products.update');