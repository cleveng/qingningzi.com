<?php

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

Route::group(['namespace' => 'Home'], function () {
    Route::get('/', [\App\Http\Controllers\Home\IndexController::class, 'index']);

    Route::get('/links', [\App\Http\Controllers\Home\LinksController::class, 'index']);
    Route::get('/links/{id}', [\App\Http\Controllers\Home\LinksController::class, 'show']);

    Route::get('/emails', [\App\Http\Controllers\Home\MailsController::class, 'index']);
    Route::get('/emails/{id?}', [\App\Http\Controllers\Home\MailsController::class, 'show']);

    Route::get('/categories', [\App\Http\Controllers\Home\CategoriesController::class, 'index']);
    Route::get('/categories/{id}', [\App\Http\Controllers\Home\CategoriesController::class, 'show']);

    Route::get('/media', [\App\Http\Controllers\Home\MediaController::class, 'index']);
    Route::get('/media/{id}', [\App\Http\Controllers\Home\MediaController::class, 'show']);

    Route::get('/about', [\App\Http\Controllers\Home\AboutController::class, 'index']);
    Route::get('/idols', [\App\Http\Controllers\Home\IdolsController::class, 'index']);

    Route::get('/s/{id?}', [\App\Http\Controllers\Home\ArticlesController::class, 'show']);
    Route::get('/p/{id?}', [\App\Http\Controllers\Home\PostsController::class, 'show']);

    Route::get('/search', [\App\Http\Controllers\Home\SearchController::class, 'index']);
});
