<?php

use App\Http\Controllers\AuthManagerController;
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

//--------------------------------------login register routes
Route::get('/', function () {
    return view('login');
})->name('login');


Route::get('/login', [AuthManagerController::class, 'login'])->name('login');

Route::post('/login', [AuthManagerController::class, 'loginPost'])->name('login.post');

Route::get('/dashboard', [AuthManagerController::class, 'goToDashboard'])->name('dashboard');

Route::get('/registration', [AuthManagerController::class, 'registration'])->name('registration');

Route::post('/registration', [AuthManagerController::class, 'registrationPost'])->name('registrationPost');

Route::get('/logout', [AuthManagerController::class, 'logout'])->name('logout');
