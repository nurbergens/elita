<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
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
Route::get('/', [MainController::class, 'index'])->name('main.index');
Route::get('/news/{current_news}', [NewsController::class, 'show'])->name('news.show');
Route::get('/news', [NewsController::class, 'search'])->name('news.search');

Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category.index');
