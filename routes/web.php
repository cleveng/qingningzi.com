<?php

use App\Http\Controllers\Dashboard\RecordsController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\ArticlesController;
use App\Http\Controllers\Home\CategoriesController;
use App\Http\Controllers\Home\CommentsController;
use App\Http\Controllers\Home\IdolsController;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\LinksController;
use App\Http\Controllers\Home\MailsController;
use App\Http\Controllers\Home\PlatformsController;
use App\Http\Controllers\Home\RedirectController;
use App\Http\Controllers\Home\SearchController;
use App\Http\Controllers\Home\SubscriptionController;
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
    Route::get('/', [IndexController::class, 'index'])->name('home');

    Route::get('/links', [LinksController::class, 'index'])->name('links');

    Route::get('/emails', [MailsController::class, 'index']);
    Route::get('/emails/{id?}', [MailsController::class, 'index']);

    Route::get('/categories', [CategoriesController::class, 'index']);
    Route::get('/categories/{id}', [CategoriesController::class, 'show']);

    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/idols', [IdolsController::class, 'index'])->name('idols');

    // support .html
    Route::get('/s/{id?}.html', [ArticlesController::class, 'show'])
        ->where('id', '[\w\-]+');

    Route::get('/search', [SearchController::class, 'index'])->name('search');
    Route::get('/redirect', [RedirectController::class, 'index']);

    Route::get('/platforms', [PlatformsController::class, 'index']);
    Route::get('/platforms/{id}', [PlatformsController::class, 'show']);

    Route::post('/subscribe', [SubscriptionController::class, 'store']);
    Route::get('/unsubscribe/{token}/{email}', [SubscriptionController::class, 'update']);

    // comments middleware auth
    Route::post('/comments', [CommentsController::class, 'store'])->middleware(['auth', 'verified']);
});

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
*/
Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth', 'verified'], 'prefix' => 'dashboard'], function () {
    Route::get('/', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'records'], function () {
        Route::get('/', [RecordsController::class, 'index']);
        Route::post('/', [RecordsController::class, 'store']);
        Route::get('/create', [RecordsController::class, 'create']);
        Route::get('/{id}/edit', [RecordsController::class, 'edit']);
        Route::put('/{id}', [RecordsController::class, 'update']);
    });
});

require __DIR__ . '/auth.php';
