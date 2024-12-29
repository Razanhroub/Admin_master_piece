<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserSideController;




// Route::middleware('isUser')->group(function () {
    Route::controller(UserSideController::class)->group(function () {
        Route::get('/userhome', 'userhome')->name('userhome');
    });
// });
require __DIR__ . '/user_auth.php'; 