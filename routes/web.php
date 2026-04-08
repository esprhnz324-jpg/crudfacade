<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'index'])->name('index');

Route::get('/register', [AuthController::class, 'showRegForm'])->name('auth.register');
Route::post('/registered', [AuthController::class, 'register'])->name('registered');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/logged', [AuthController::class, 'login'])->name('logged');

Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::get('/homepage', [AuthController::class, 'showHome'])->name('page.home');

Route::get('/profile', [AuthController::class, 'showProfile'])->name('page.profile');
Route::get('/profile/edit', [AuthController::class, 'showUpdateForm'])->name('page.updateprofile');
Route::post('/update-profile', [AuthController::class, 'update'])->name('page.updateprofile.submit');

