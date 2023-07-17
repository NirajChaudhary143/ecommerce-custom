<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth','role:owner|staff')->group(function(){
    Route::get('/admin-panel',[AdminController::class,'admin'])->name('admin_panel');
    Route::get('/admin/store-user',[AdminController::class,'storeUser'])->name('store_user');
    Route::get('/admin/category',[AdminController::class,'category'])->name('admin.category');
    Route::post('/admin/add-category',[CategoryController::class,'store'])->name('add.category');
});
Route::middleware('auth','role:owner')->group(function(){
    Route::get('/admin/delete-category/{id}',[CategoryController::class,'delete'])->name('delete.category');
});
Route::get('/redirect',[AdminController::class,'index'])->name('redirect');

require __DIR__.'/auth.php';
