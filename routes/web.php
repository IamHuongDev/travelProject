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

Route::get('/partner/category',[\App\Http\Controllers\CategoryController::class,'index']);
Route::post('/partner/category',[\App\Http\Controllers\CategoryController::class,'store']);

