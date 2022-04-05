<?php

use App\Http\Controllers\Admin\{
    CategoryController,
    ProductController
};
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Site\OrderController as SiteOrderController;
use App\Http\Controllers\Site\ProductController as SiteProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    /* Categories */
    Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

    
    /* Products */
    Route::post('products/{product}/images', [ProductController::class, 'uploadImage'])->name('products.uploadimages');
    Route::delete('products/{product}/images', [ProductController::class, 'deleteImage'])->name('products.deleteimage');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    /* Orders */
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');

});

/* Site */
Route::get('/', [SiteProductController::class, 'index'])->name('site.index');
Route::get('/products/{product}', [SiteProductController::class, 'show'])->name('site.products.show');

/* Orders */
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order:code}', [SiteOrderController::class, 'show'])->name('site.orders.show');





require __DIR__ . '/auth.php';
