<?php

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IngredientController;

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
    Route::get('/page-lock','pagelock');
    Route::get('/table-basic','tablebasic');
    Route::get('/uc-sweetalert','ucsweetalert');
    Route::get('master','master');
   
});
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::resource('/user-table',UserController::class);
Route::resource('/categories-table', CategoryController::class);
Route::resource('/recipes-table', RecipeController::class);
Route::resource('/ingredients-table', IngredientController::class);
Route::resource('/Blogs-table', BlogController::class);
Route::resource('/comments-table', CommentController::class);
// Route to display the edit form

Route::get('/categories-table/{id}/edit', [CategoryController::class, 'edit'])->name('categories-table.edit');
Route::put('/categories-table/{id}', [CategoryController::class, 'update'])->name('categories-table.update');
require __DIR__.'/auth.php';
