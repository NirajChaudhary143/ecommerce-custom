<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\productImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\TempImageController;
use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','verified','role:owner|staff')->group(function(){
    Route::get('/admin-panel',[AdminController::class,'admin'])->name('admin_panel');
    Route::get('/admin/store-user',[AdminController::class,'storeUser'])->name('store_user');
    Route::get('/admin/category',[AdminController::class,'category'])->name('admin.category');
    Route::post('/admin/add-category',[CategoryController::class,'store'])->name('add.category');
    Route::get('/admin/product',[ProductController::class,'show'])->name('show.product');
    Route::get('/admin/edit/product/{id}',[ProductController::class,'editView'])->name('edit.product');
    Route::post('/admin/edit/product/{id}',[ProductController::class,'updateProduct'])->name('update.product');
    Route::get('/admin/add-product',[ProductController::class,'index'])->name('view.add.product.form');
    Route::post('/admin/add-product',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/admin/delete-product/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::post('/product-images',[productImageController::class,'store'])->name('product-image.store');
    Route::delete('/product-images/delete/{image_id}',[productImageController::class,'deleteImage'])->name('product-image.delete');
    Route::get('/admin/all-permission',[roleController::class,'index'])->name('all.permission');
    Route::post('/admin/temp-images',[TempImageController::class,'store'])->name('temp-images.create');
    Route::delete('/delete-temp-images/{image_id}',[TempImageController::class,'deleteTempImage'])->name("delete-temp-images");
    
    // Route::post('/logout',[AdminController::class,'destroy'])->name('admin.logout.btn');
});
Route::middleware('auth','verified','role:owner')->group(function(){
    Route::get('/admin/delete-category/{id}',[CategoryController::class,'delete'])->name('delete.category');

    Route::get('admin/add/permission',[roleController::class,'viewPermissionForm'])->name('view.permission');
    Route::post('admin/add/permission',[roleController::class,'addPermission'])->name('add.permission');
});
Route::get('/redirect',[AdminController::class,'redirect'])->name('redirect')->middleware(['auth','verified']);

//user website

   Route::get('/',[UserController::class,'index'])->name('website.homepage');
   Route::get('/product-details/{id}',[UserController::class,'product_details'])->name('product.details');
require __DIR__.'/auth.php';
