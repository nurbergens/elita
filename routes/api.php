<?php

use App\Http\Controllers\Api\CategoryIndexController;
use App\Http\Controllers\Api\NewsByThreeController;
use App\Http\Controllers\Api\NewsShowController;
use App\Http\Controllers\Api\SidebarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//
Route::get('/sidebar', [SidebarController::class, 'index'])->name('api.sidebar');
Route::get('/news/by-three/{id}', [NewsByThreeController::class, 'index'])->name('api.news.by-three');
Route::get('/news/{id}', [NewsShowController::class, 'index'])->name('api.news.show');
Route::get('/category/{id}', [CategoryIndexController::class, 'index'])->name('api.category.index');
