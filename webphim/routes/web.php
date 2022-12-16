<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
// admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PrisodeController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\GenreController;

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

Route::get('/',[IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc',[IndexController::class, 'category'])->name('category');
Route::get('/the-loai',[IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia',[IndexController::class, 'country'])->name('country');
Route::get('/phim',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim',[IndexController::class, 'watch'])->name('watch');
Route::get('/tap-phim',[IndexController::class, 'episode'])->name('episode');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// route admin

Route::resource('category', CategoryController::class);
Route::resource('movie', MovieController::class);
Route::resource('prisode', PrisodeController::class);
Route::resource('watch', WatchController::class);
Route::resource('country', CountryController::class);
Route::resource('genre', GenreController::class);