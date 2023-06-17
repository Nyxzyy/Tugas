<?php

use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['prefix' => '/User'],function () {
    Route::get('/Home', [WebController::class, 'index'])->name('Home');
    Route::get('/About',[WebController::class,'About'])->name('About');

});

Route::group(['prefix'=>'/Admin'],function(){
    Route::get('/Home',[\App\Http\Controllers\HomeController::class,'index'])->name('admin_home');
    Route::post('/Porto', [PortfolioController::class, 'store'])->name('create_porto');
    Route::get('/Porto', [PortfolioController::class, 'create'])->name('form_porto');
    Route::put('/Porto/{id}',[PortfolioController::class, 'update'])->name('update_porto');
    Route::delete('/Porto/{id}', [PortfolioController::class, 'destroy'])->name('delete_porto');
    Route::get('/Porto/{id}', [PortfolioController::class, 'edit'])->name('form_update_porto');
    Route::post('/category', [CategoryController::class, 'store'])->name('create_category');
    Route::get('/category', [CategoryController::class, 'create'])->name('form_category');
    Route::put('/category/{id}',[CategoryController::class, 'update'])->name('update_category');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('delete_category');
    Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('form_update_category');

});

Auth::routes(['confirm' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/portfolio',\App\Http\Controllers\PortfolioController::class);
