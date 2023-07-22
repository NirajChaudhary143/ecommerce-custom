<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','verified','role:owner|staff')->group(function(){
    Route::get('/admin-panel',[AdminController::class,'admin'])->name('admin_panel');
    Route::get('/admin/store-user',[AdminController::class,'storeUser'])->name('store_user');
    Route::get('/admin/category',[AdminController::class,'category'])->name('admin.category');
    Route::post('/admin/add-category',[CategoryController::class,'store'])->name('add.category');
    Route::get('/admin/product',[ProductController::class,'show'])->name('show.product');
    Route::get('/admin/add-product',[ProductController::class,'index'])->name('view.add.product.form');
    Route::post('/admin/add-product',[ProductController::class,'addProduct'])->name('add.product');
    // Route::post('/logout',[AdminController::class,'destroy'])->name('admin.logout.btn');
});
Route::middleware('auth','verified','role:owner')->group(function(){
    Route::get('/admin/delete-category/{id}',[CategoryController::class,'delete'])->name('delete.category');
});
Route::get('/redirect',[AdminController::class,'index'])->name('redirect')->middleware(['auth','verified']);

require __DIR__.'/auth.php';
