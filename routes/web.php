<?php

use App\Http\Controllers\Website\Contact\ContactController;
use App\Http\Controllers\Website\Faq\FaqController;
use App\Http\Controllers\Website\Home\HomeController;
use App\Http\Controllers\Website\Registration\RegistrationController;
use App\Http\Controllers\Website\Regulation\RegulationController;
use App\Http\Controllers\Website\Schedule\ScheduleController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Landing
Route::get('/', [HomeController::class, 'index'])->name('landing.index');
// Faq
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/registration', [RegistrationController::class, 'index'])->name('registration.index');
Route::post('/registration/store', [RegistrationController::class, 'store'])->name('registration.store');

Route::get('/regulation', [RegulationController::class, 'index'])->name('regulation.index');
Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule.index');
