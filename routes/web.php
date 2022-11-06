<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
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
    return view('welcome');
})->name('home');

Route::prefix('register')->group(function () {
    Route::get('/', [RegistrationController::class, 'create'])->name('register_user');
    Route::post('/', [RegistrationController::class, 'store'])->name('store_user');
});

Route::post('/login', [AuthController::class, 'auth'])->name('auth');
Route::get('/login', [AuthController::class, 'login_form'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
