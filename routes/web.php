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

Route::get('/partner', function () {
    return view('Partner.HomePage');
});
Route::get('/partner/login',[\App\Http\Controllers\PartnerController::class,'viewLogin']);
Route::post('/partner/login',[\App\Http\Controllers\PartnerController::class,'Login']);
Route::get('/partner/register',[\App\Http\Controllers\PartnerController::class,'viewRegister']);
Route::post('/partner/register',[\App\Http\Controllers\PartnerController::class,'Register']);
Route::get('/partner/logout',[\App\Http\Controllers\PartnerController::class,'Logout']);
Route::get('/partner/active/{hash}',[\App\Http\Controllers\PartnerController::class,'Active']);
Route::get('/partner/reset-password',[\App\Http\Controllers\PartnerController::class,'ResetPassword']);
Route::get('/partner/reset-password/{email}',[\App\Http\Controllers\PartnerController::class,'SendMailResetPassword']);
Route::get('/partner/reset/{hash}',[\App\Http\Controllers\PartnerController::class,'viewReset']);
Route::post('/partner/reset/',[\App\Http\Controllers\PartnerController::class,'ResetPasswordChange']);

Route::post('/partner/check-email',[\App\Http\Controllers\PartnerController::class,'checkEmail']);

Route::group(['prefix' => '/partner', 'middleware' => 'checkPartner'], function () {

    Route::group(['prefix' => '/chat'], function () {
        Route::get('/ver-1',[\App\Http\Controllers\ChatController::class,'indexChatVer1']);
        Route::post('/ver-1',[\App\Http\Controllers\ChatController::class,'sendMessageChatVer1']);
        Route::get('/load-ver-1',[\App\Http\Controllers\ChatController::class,'showMessageChatVer1']);

        //final
        Route::get('/',[\App\Http\Controllers\ChatController::class,'index']);
        Route::get('/delete',[\App\Http\Controllers\ChatController::class,'deleteAll']);

    });

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

        Route::get('/ajax',[\App\Http\Controllers\NewsController::class,'indexAjax']);
        Route::post('/ajax',[\App\Http\Controllers\NewsController::class,'storeAjax'])->name('storeNews');

        Route::post('/find/title',[\App\Http\Controllers\NewsController::class,'findTitle']);

        Route::get('/getData',[\App\Http\Controllers\NewsController::class,'showAjax']);
        Route::get('/delete/{id}',[\App\Http\Controllers\NewsController::class,'destroy']);
        Route::get('/deleteAjax/{id}',[\App\Http\Controllers\NewsController::class,'destroyAjax']);
        Route::get('/editAjax/{id}',[\App\Http\Controllers\NewsController::class,'editAjax']);
        Route::post('/updateAjax',[\App\Http\Controllers\NewsController::class,'updateAjax']);

        Route::get('/changeOpen/{id}',[\App\Http\Controllers\NewsController::class,'changeOpen']);

        Route::get('/edit/{id}',[\App\Http\Controllers\NewsController::class,'edit']);
        Route::post('/update',[\App\Http\Controllers\NewsController::class,'update']);
        Route::get('/delete/{id}',[\App\Http\Controllers\NewsController::class,'destroy']);
    });
});

