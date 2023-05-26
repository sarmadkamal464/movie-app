<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeriesDetailsController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SeriesGenreController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SearchSeriesController;;
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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/movie/list', [MoviesController::class, 'index'])->name('movies.list');
Route::get('/movie/{id}', [DetailsController::class, 'show'])->name('movies.show');
Route::get('/series/list', [SeriesController::class, 'index'])->name('series.list');
Route::get('/series/{id}', [SeriesDetailsController::class, 'show'])->name('series.show');
Route::get('/genres', [GenreController::class, 'list'])->name('genre');
Route::get('/genres/{id}', [GenreController::class, 'showGenre'])->name('genre.movies');
Route::get('/genres/{id}/series', [SeriesGenreController::class, 'getSeriesByGenre'])->name('genre.series');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/search/series', [SearchSeriesController::class, 'search'])->name('search.series');
