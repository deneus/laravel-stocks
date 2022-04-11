<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [HomeController::class, 'displayHome'])
    ->name('/');

Route::get('/category/{category:id}', [CategoryController::class, 'displayCategory'])
    ->name('category');

Route::get('/subcategory/{subcategory:id}', [SubCategoryController::class, 'displaySubCategory'])
    ->name('sub_category');

Route::get('/cart', [CartController::class, 'displayCart'])
    ->name('cart');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])
    ->name('add_to_cart');

Route::get('/admin', [AdminController::class, 'home'])
    ->name('home')
    ->middleware('auth');

Route::group(['middleware' => ['auth']], function() {
    /**
     * Logout Route
     */
    Route::get('/logout',  [LogoutController::class, 'perform'] )->name('logout.perform');

    Route::prefix('admin')->group(function() {
        Route::resource('categories', AdminCategoryController::class);
    });
});
