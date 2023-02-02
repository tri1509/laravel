<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
// admin controller
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\WatchController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\FootageController;

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
Route::get('/danh-muc/{slug}',[IndexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}',[IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}',[IndexController::class, 'country'])->name('country');
Route::get('/thuoc-phim/{slug}',[IndexController::class, 'footage'])->name('footage');
Route::get('/phim/{slug}',[IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}/{tap}',[IndexController::class, 'watch'])->name('watch');
Route::get('/so-tap',[IndexController::class, 'episode'])->name('so-tap');
Route::get('/nam-{year}',[IndexController::class, 'year']);
Route::get('/tag/{tag}',[IndexController::class, 'tag']);
Route::get('/tim-kiem',[IndexController::class, 'timkiem'])->name('tim-kiem');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// route admin

Route::resource('category', CategoryController::class);

Route::post('resorting', [CategoryController::class,'resorting']) -> name('resorting');
Route::post('resorting', [MovieController::class,'resorting']) -> name('resorting');

Route::resource('movie', MovieController::class);
Route::resource('episode', EpisodeController::class);
Route::resource('watch', WatchController::class);
Route::resource('country', CountryController::class);
Route::resource('genre', GenreController::class);

Route::get('update-year-phim', [MovieController::class,'update_year']);
Route::get('update-topview-phim', [MovieController::class,'update_topview']);
Route::get('select-movie', [EpisodeController::class,'select_movie']) -> name('select-movie');
Route::get('add-episode/{id}',[EpisodeController::class, 'add_episode'])->name('add-episode');
Route::get('edit-episode/{id}',[EpisodeController::class, 'edit_episode'])->name('edit-episode');