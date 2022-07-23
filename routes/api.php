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

Route::prefix('posts')->name('posts.')->group(function(){
    Route::get('/list', [PostController::class, 'index'])->name('index');
    Route::get("/{id}", [PostController::class, 'show'])->name('show');
    Route::post("/create", [PostController::class, 'store'])->name('store');
    Route::put("/{id}", [PostController::class, 'update'])->name('update');
    Route::delete("/{id}", [PostController::class, 'destroy'])->name("delete");
});

Route::prefix('media')->name('media.')->group(function(){
    Route::get('public/{bucketName}/{objectName}', [MediaController::class, 'getMediaFile'])
        ->name('get');
});

Route::prefix('category')->name('category.')->group(function (){
    Route::get('/list', [\App\Http\Controllers\CategoryController::class, 'index'])->name('index');
    Route::get('/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('show');
    Route::post('/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('store');
    Route::put('/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete');
});
