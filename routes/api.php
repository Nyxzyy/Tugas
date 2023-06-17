<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [ApiController::class,'login'])->name('login');

Route::group(['middleware' => ['auth:api']], function(){

    Route ::get('portofolios',[ApiController::class,'index']);
    Route ::post('portofolios',[ApiController::class,'store']);
    Route ::put('portofolios/{id}',[ApiController::class,'update']);
    Route ::delete('portofolios/{id}',[ApiController::class,'destroy']);

    Route::post('/logout', [ApiController::class,'logout'])->name('logout');
});


// Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');

/**
 * route "/login"
 * @method "POST"
 */


/**
 * route "/user"
 * @method "GET"
 */
