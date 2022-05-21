<?php

use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
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

Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::post("/create", [PostController::class, 'store'])->name('store');
});

Route::prefix('media')->name('media.')->group(function () {
    Route::get('public/{bucketName}/{objectName}', [MediaController::class, 'getMediaFile'])
        ->name('get');
});
