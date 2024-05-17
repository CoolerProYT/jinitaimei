<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::controller(HomeController::class)->group(function () {
    Route::get('/','home')->name('home');
    Route::get('/music','music')->name('music');
    Route::get('/images','image')->name('image');
});

Route::controller(AuthController::class)->prefix('admin')->group(function () {
    Route::get('/','login');
    Route::get('/login','login')->name('login');
    Route::get('/logout','logout')->name('logout');
});

Route::prefix('admin')->middleware('auth:web')->group(function(){
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::get('/music','music')->name('admin.music');
        Route::get('/image','image')->name('admin.image');
    });
});
