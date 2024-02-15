<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\LetterListController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return view('index');
})->name("home");

Route::middleware(['already_login'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.submit');

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
});

Route::middleware(['is_login'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/letters/create', [LetterController::class, 'create'])->name('letters.create');
    Route::post('/letters/create', [LetterController::class, 'store'])->name('letters.store');
    Route::get('/letters', [LetterListController::class, 'index'])->name('letters.index');
    Route::get('/letters/{id}', [LetterListController::class, 'show'])->name('letters.show');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/letters/{letter}/edit', [LetterController::class, 'edit'])->name('letters.edit');
    Route::put('/letters/{letter}', [LetterController::class, 'update'])->name('letters.update');
});

Route::middleware(['is_admin'])->group(function () {
    Route::get('/letters', [LetterListController::class, 'index'])->name('letters.index');
    Route::get('/letters/{id}', [LetterListController::class, 'show'])->name('letters.show');
    Route::get('/letters/{id}/admin-edit', [LetterController::class, 'adminEdit'])->name('letters.admin-edit');
    Route::put('/letters/{id}', [LetterController::class, 'adminUpdate'])->name('letters.adminUpdate');
});