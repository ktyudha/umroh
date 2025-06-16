<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Pasengger\PasenggerController;
use App\Http\Controllers\Admin\Travel\TravelController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-panel', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
        Route::post('/login', [LoginController::class, 'store'])->name('auth.login.process');
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    });



    Route::middleware('auth:web', 'permission:admin access')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        Route::resource('travel', TravelController::class);
        Route::resource('passenger', PasenggerController::class);
    });
});
