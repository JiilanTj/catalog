<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HomepageController;

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

Route::get('/', [HomepageController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product-upload', [ProductController::class, 'showUploadForm'])->name('product.upload');
Route::post('/product-upload', [ProductController::class, 'store']);
Route::get('/get-subcategories-by-category', [ProductControllerName::class, 'getSubCategoriesByCategory']);
Route::get('/add-category', [CategoryController::class, 'showAddForm'])->name('add-category');
Route::post('/add-category', [CategoryController::class, 'store']);
Route::get('/delete-category', [CategoryController::class, 'showDeleteCategoryPage'])->name('delete-category');
Route::post('/delete-category', [CategoryController::class, 'deleteCategory'])->name('delete-category');
Route::get('/tampil-product', [ProductController::class, 'showProducts'])->name('tampil-product');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::get('/add-subcategory', [SubCategoryController::class, 'showAddForm'])->name('add-subcategory');
Route::post('/add-subcategory', [SubCategoryController::class, 'store']);
Route::get('/delete-subcategory', [SubCategoryController::class, 'showDeleteSubCategoryPage'])->name('delete-sub-category');
Route::post('/delete-subcategory', [SubCategoryController::class, 'deleteSubCategory'])->name('delete-sub-category');
Route::get('/get-subcategories/{category}', [ProductController::class, 'getSubCategories']);




require __DIR__.'/auth.php';
