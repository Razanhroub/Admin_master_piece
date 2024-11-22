<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(ThemeController::class)->group(function () {

    Route::get('/app-calender','appcalendar');
    Route::get('/app-profile','appprofile');
    Route::get('/chart-morris','chartmorris');
    Route::get('/form-validation','formvalidation');
    Route::get('/home','home');
    Route::get('/page-error-400','pageerror400');
    Route::get('/page-error-403','pageerror403');
    Route::get('/page-error-404','pageerror404');
    Route::get('/page-error-500','pageerror500');
    Route::get('/page-error-503','pageerror503');
    Route::get('/page-lock','pagelock');
    Route::get('/table-basic','tablebasic');
    Route::get('/table-datatable','tabledatatable');
    Route::get('/uc-sweetalert','ucsweetalert');
    Route::get('master','master');
    
   
});

require __DIR__.'/auth.php';
