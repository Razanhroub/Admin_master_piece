<?php

use App\Http\Controllers\UserAuth\AuthenticatedSessionController;
use App\Http\Controllers\UserAuth\ConfirmablePasswordController;
use App\Http\Controllers\UserAuth\EmailVerificationNotificationController;
use App\Http\Controllers\UserAuth\EmailVerificationPromptController;
use App\Http\Controllers\UserAuth\NewPasswordController;
use App\Http\Controllers\UserAuth\PasswordController;
use App\Http\Controllers\UserAuth\PasswordResetLinkController;
use App\Http\Controllers\UserAuth\RegisteredUserController;
use App\Http\Controllers\UserAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:user')->group(function () {
    Route::get('user.userregister', [RegisteredUserController::class, 'create']);

    Route::post('/userregister', [RegisteredUserController::class, 'store'])->name('user.userregister');


    Route::get('user.userlogin', [AuthenticatedSessionController::class, 'create']);
       

    Route::post('/userlogin', [AuthenticatedSessionController::class, 'store'])->name('user.userlogin');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});


;
Route::post('/userlogout', [AuthenticatedSessionController::class, 'destroy'])->name('user.userlogout');

// Route::middleware('auth')->group(function () {
//     Route::get('verify-email', EmailVerificationPromptController::class)
//         ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//         ->middleware('throttle:6,1')
//         ->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//         ->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');


// });
