<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route ::get('portofolios',[\App\Http\Controllers\ApiController :: class,'index']);
Route ::post('portofolios',[\App\Http\Controllers\ApiController :: class,'store']);
Route ::put('portofolios/{id}',[\App\Http\Controllers\ApiController :: class,'update']);
Route ::delete('portofolios/{id}',[\App\Http\Controllers\ApiController :: class,'destroy']);
