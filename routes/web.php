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

    Route::get('/emails', [\App\Http\Controllers\Home\MailsController::class, 'index']);
    Route::get('/emails/{id?}', [\App\Http\Controllers\Home\MailsController::class, 'index']);

    Route::get('/categories', [\App\Http\Controllers\Home\CategoriesController::class, 'index']);
    Route::get('/categories/{id}', [\App\Http\Controllers\Home\CategoriesController::class, 'show']);

    Route::get('/about', [\App\Http\Controllers\Home\AboutController::class, 'index']);
    Route::get('/idols', [\App\Http\Controllers\Home\IdolsController::class, 'index']);

    Route::get('/s/{id?}', [\App\Http\Controllers\Home\ArticlesController::class, 'show']);

    Route::get('/search', [\App\Http\Controllers\Home\SearchController::class, 'index']);
    Route::get('/redirect', [\App\Http\Controllers\Home\RedirectController::class, 'index']);

    Route::get('/platforms', [\App\Http\Controllers\Home\PlatformsController::class, 'index']);
    Route::get('/platforms/{id}', [\App\Http\Controllers\Home\PlatformsController::class, 'show']);

    Route::post('/subscribe', [\App\Http\Controllers\Home\SubscriptionController::class, 'store']);
    Route::get('/unsubscribe/{token}/{email}', [\App\Http\Controllers\Home\SubscriptionController::class, 'update']);

    // comments middleware auth
    Route::post('/comments', [\App\Http\Controllers\Home\CommentsController::class, 'store'])->middleware(['auth', 'verified']);
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'records'], function () {
        Route::get('/', [\App\Http\Controllers\Dashboard\RecordsController::class, 'index']);
        Route::post('/', [\App\Http\Controllers\Dashboard\RecordsController::class, 'store']);
        Route::get('/create', [\App\Http\Controllers\Dashboard\RecordsController::class, 'create']);
        Route::get('/{id}/edit', [\App\Http\Controllers\Dashboard\RecordsController::class, 'edit']);
        Route::put('/{id}', [\App\Http\Controllers\Dashboard\RecordsController::class, 'update']);
    });
});

require __DIR__ . '/auth.php';
