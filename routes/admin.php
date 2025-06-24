<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\Admin\Inbox\InboxController;
use App\Http\Controllers\Admin\Pasengger\PasenggerController;
use App\Http\Controllers\Admin\Pilgrimage\PilgrimageTypeController;
use App\Http\Controllers\Admin\Setting\AboutController;
use App\Http\Controllers\Admin\Setting\BasicInfoController;
use App\Http\Controllers\Admin\Setting\LogoController;
use App\Http\Controllers\Admin\SocialMedia\SocialMediaController;
use App\Http\Controllers\Admin\Travel\TravelController;
use App\Http\Controllers\Admin\User\PermissionController;
use App\Http\Controllers\Admin\User\RoleController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Pilgrimage\PilgrimageBatchController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin-panel', 'as' => 'admin.'], function () {

    Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function () {
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
        Route::post('/login', [LoginController::class, 'store'])->name('auth.login.process');
        Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');
    });



    Route::middleware('auth:web', 'permission:admin access')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        // User
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('roles/{role}/permissions', PermissionController::class);

        // Inbox
        Route::resource('inboxes', InboxController::class);

        // Social
        Route::resource('social', SocialMediaController::class);

        // Pilgrimage
        Route::resource('pilgrimage-type', PilgrimageTypeController::class);
        Route::resource('pilgrimage-batch', PilgrimageBatchController::class);

        // Settings
        Route::prefix('settings')
            ->name('settings.')
            ->middleware('permission:settings')
            ->group(function () {
                Route::get('basic-info', [BasicInfoController::class, 'edit'])->name('basic-info.edit');
                Route::put('basic-info', [BasicInfoController::class, 'update']);

                Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
                Route::put('about', [AboutController::class, 'update'])->name('about.update');
                Route::get('logo', [LogoController::class, 'edit'])->name('logo.edit');
                Route::put('logo', [LogoController::class, 'update'])->name('logo.update');
            });

        Route::resource('travel', TravelController::class);
        Route::resource('passenger', PasenggerController::class);
    });
});
