<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserSideController;
use App\Http\Controllers\FilterationController;
use App\Http\Controllers\Tables\BlogController;
use App\Http\Controllers\Tables\UserController;
use App\Http\Controllers\Tables\RecipeController;
use App\Http\Controllers\Tables\CommentController;
use App\Http\Controllers\Tables\CategoryController;
use App\Http\Controllers\Tables\IngredientController;
use App\Http\Controllers\Tables\SubcategoryController;




Route::get('/', function () {
    return view('welcome');
});






Route::get('/page-error-400', [ThemeController::class, 'pageerror400'])->name('page-error-400');
Route::get('/page-error-403', [ThemeController::class, 'pageerror403'])->name('page-error-403');
Route::get('/page-error-404', [ThemeController::class, 'pageerror404'])->name('page-error-404');
Route::get('/page-error-500', [ThemeController::class, 'pageerror500'])->name('page-error-500');
Route::get('/page-error-503', [ThemeController::class, 'pageerror503'])->name('page-error-503');
Route::fallback(function () {
    return response()->view('theme.page-error-404', [], 404);
});
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(ThemeController::class)->group(function () {
        Route::get('/app-calender', 'appcalendar');
        Route::get('/app-profile', 'appprofile');
        Route::get('/chart-morris', 'chartmorris');
        Route::get('/form-validation', 'formvalidation');
        Route::get('/home', 'home')->name('home');
        Route::get('/page-lock', 'pagelock');
        Route::get('/table-basic', 'tablebasic');
        Route::get('/uc-sweetalert', 'ucsweetalert');
        Route::get('master', 'master');
    });

    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::resource('/user-table', UserController::class);
    Route::resource('/categories-table', CategoryController::class);
    Route::resource('/subcategories', SubcategoryController::class);
    Route::resource('/recipes-table', RecipeController::class);
    Route::resource('/ingredients-table', IngredientController::class);
    Route::resource('/Blogs-table', BlogController::class);
    Route::resource('/comments-table', CommentController::class);
});

Route::controller(UserSideController::class)->group(function () {
    // Route::get('/userhome', 'userhome');
    Route::get('/menu', 'menu');
    Route::get('/blog', 'blog');
    Route::get('/contact', 'contact');
    Route::get('/about', 'about');
    Route::get('/p', 'p');
    Route::get('/categories', 'categories');
    Route::get('/userlogin', 'userlogin')->name('user.userlogin');
    Route::get('/userregister', 'userregister')->name('user.userregister');
    Route::get('/edit-profile', 'edit_p')->name('edit_p');
    Route::get('/userfollowers', 'userfollowers')->name('userfollowers');


});
Route::post('/edit-profile', [UserController::class, 'updateProfile'])->name('editProfile');

Route::get('/recipedetails/{id}', [RecipeController::class, 'showRecipeDetails'])->name('recipedetails');
Route::get('/menu', [FilterationController::class, 'showRecipesByCategory']);
Route::get('/filter-recipes', [FilterationController::class, 'filterRecipesBySubcategory'])->name('recipes.filter');
Route::get('/get-subcategories', [FilterationController::class, 'getSubcategories'])->name('subcategories.get');
require __DIR__ . '/auth.php';  
require __DIR__ . '/user.php';  
