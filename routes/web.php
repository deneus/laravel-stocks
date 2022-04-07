<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubCategoryController;
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

Route::get('/', [HomeController::class, 'displayHome'])
    ->name('home');

Route::get('/category/{category:id}', [CategoryController::class, 'displayCategory'])
    ->name('category');

Route::get('/subcategory/{subcategory:id}', [SubCategoryController::class, 'displaySubCategory'])
    ->name('sub_category');
