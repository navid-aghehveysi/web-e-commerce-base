<?php

use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::as('front.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});
