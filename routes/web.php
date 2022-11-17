<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Profile\ProfileController;
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

Route::post('/test',[RegistrationController::class,'test']);

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/register', [RegistrationController::class, 'create'])->name('register_user');
    Route::post('/register', [RegistrationController::class, 'store'])->name('store_user');
});

Route::controller(AuthController::class)->group(function ()
{
    Route::post('/login', [AuthController::class, 'auth'])->name('auth');
    Route::get('/login', [AuthController::class, 'login_form'])->name('login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::middleware('auth')->group(function()
{
    Route::get('profile/{id}',[ProfileController::class,'index'])->name('index_profile');
    Route::get('profile/edit/{id}',[ProfileController::class,'edit'])->name('edit_profile');
    Route::post('profile/edit/{id}',[ProfileController::class,'store'])->name('store_profile');
    Route::post('profile/delete',[ProfileController::class,'delete'])->name('delete_from_profile');
});


