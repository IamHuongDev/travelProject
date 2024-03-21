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

Route::get('/', function () {
    return view('Partner.Master');
});

Route::group(['prefix' => '/partner'], function () {
    Route::group(['prefix' => '/category'], function () {
        Route::get('/',[\App\Http\Controllers\CategoryController::class,'index']);
        Route::post('/',[\App\Http\Controllers\CategoryController::class,'store']);
        Route::get('/edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit']);
        Route::post('/update',[\App\Http\Controllers\CategoryController::class,'update']);
        Route::get('/delete/{id}',[\App\Http\Controllers\CategoryController::class,'destroy']);
    });
    Route::group(['prefix' => '/new'], function () {
        Route::get('/',[\App\Http\Controllers\NewsController::class,'index']);
        Route::post('/',[\App\Http\Controllers\NewsController::class,'store']);
        Route::get('/edit/{id}',[\App\Http\Controllers\NewsController::class,'edit']);
        Route::post('/update',[\App\Http\Controllers\NewsController::class,'update']);
        Route::get('/delete/{id}',[\App\Http\Controllers\NewsController::class,'destroy']);
    });
});

