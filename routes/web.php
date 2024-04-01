<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\BlogController;
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

/* xây dựng route theo cách củ
Route::controller(App\Http\Controllers\Blog\BlogController::class)
    ->prefix('/')
    ->as('post.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{slug}', 'showPost')->name('show');
    });
*/
Route::prefix('/')->as('post.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'showPost'])->name('show');
});
