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

//
//    Route::group(['namespace' => 'Publish'], function () {
//        Route::get('/lists_{catid?}_{id?}.html', 'ListController@index')
//            ->where(["id"=>"\d+", "catid"=>"\d+"]);
//        Route::get('/media', 'IndexController@index');
//        Route::get('/media/{id?}', 'IndexController@show');
//    });

//    // 内容模块
//    Route::group(['namespace' => 'Contents'], function () {
//        Route::get('/article_{catid?}_{id?}.html', 'ArticlesController@index')->where(["id"=>"\d+", "catid"=>"\d+"]);
//        Route::get('/video/{id?}', 'VideoController@show');
//        Route::get('/news/{id?}', 'NewsController@show');
//        Route::get('/picture/{id?}', 'PictureController@show');
//        Route::get('/say/{id?}', 'SaysController@show');
//        Route::get('/expert/{id?}', 'ExpertController@show');
//        Route::get('/download/{id?}', 'DownloadController@show');
//    });
//
//
//    Route::group(['namespace' => 'Emails'], function () {
//        Route::get('/lists_email_{id?}.html', 'ListController@index')->where(["id"=>"\d+"]);
//        Route::get('/emails', 'IndexController@index');
//        Route::get('/emails/{id?}', 'IndexController@show');
//    });
//
//    Route::group(['namespace' => 'Mails'], function () {
//        Route::any('/subscribe', 'SubscribeController@index');
//    });
//
//    Route::group(['namespace' => 'Category'], function () {
//        Route::get('/lists_{catid?}_{id?}.html', 'ListController@index')->where(["id"=>"\d+", "catid"=>"\d+"]);
//        Route::get('/category/{id?}', 'IndexController@show');
//    });
//
//    Route::group(['namespace' => 'Rss'], function () {
//        Route::get('/rss.html', 'ListController@index');
//        Route::get('/rss_{id?}.html', 'ListController@show')->where(["id"=>"\d+"]);
//        Route::get('/rss', 'IndexController@index');
//        Route::get('/rss/{id?}', 'IndexController@show');
//    });
});
