<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\OTPController;
use Illuminate\Support\Facades\Route;

Route::as('auth.')->group(function () {

    Route::as('opt.')->group(function () {
       Route::get('/initial' , [OTPController::class , 'initial'])->name('initial');
       Route::post('/process-credential' , [OTPController::class , 'processCredential'])->name('process.credential');
       Route::post('/process-otp-verification' , [OTPController::class , 'processOtpVerification'])->name('process.otp.verification');
    });

    Route::post('/logout' , [LogoutController::class , 'logout'])->name('logout');
});
