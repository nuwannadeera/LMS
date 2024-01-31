<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManagerController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RegisterStudentController;
use App\Http\Controllers\ViewResultsController;
use App\Http\Controllers\AddResultController;

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



Route::get('/change-password', [ChangePasswordController::class, 'goToChangePasswordForm'])->name('changePasswordForm');

Route::post('/change-password/{user}', [ChangePasswordController::class, 'updatePassword'])->name('updatePassword');



Route::get('/registerStudent', [RegisterStudentController::class, 'goToRegisterStudent'])->name('goToRegisterStudent');

Route::post('/registerStudent', [RegisterStudentController::class, 'saveStudent'])->name('saveStudent');



Route::get('/viewResult', [ViewResultsController::class, 'goToResultView'])->name('goToResultView');



Route::get('/addResult', [AddResultController::class, 'getAllStudentsAndSubjects'])->name('addResultPage');

Route::post('/addResult', [AddResultController::class, 'saveResult'])->name('saveResult');
