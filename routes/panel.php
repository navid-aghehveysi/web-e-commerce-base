<?php

use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ModuleController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\SubmoduleController;
use App\Http\Controllers\Panel\SubmoduleItemController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->prefix('panel')
    ->as('panel.')
    ->group(function () {

        // Dashboard
        Route::prefix('dashboard')->as('dashboard.')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
        });

        // Module
        Route::prefix('module')->as('module.')->group(function () {
            Route::get('/', [ModuleController::class, 'index'])->name('index');
            Route::get('/create', [ModuleController::class, 'create'])->name('create');
            Route::post('/', [ModuleController::class, 'store'])->name('store');
            Route::get('/{module}/edit', [ModuleController::class, 'edit'])->name('edit');
            Route::put('/{module}', [ModuleController::class, 'update'])->name('update');
            Route::delete('/{module}', [ModuleController::class, 'destroy'])->name('destroy');
            Route::get('/{module}/status', [ModuleController::class, 'status'])->name('status');
        });

        // Submodule
        Route::prefix('submodule')->as('submodule.')->group(function () {
            Route::get('/', [SubmoduleController::class, 'index'])->name('index');
            Route::get('/create', [SubmoduleController::class, 'create'])->name('create');
            Route::post('/', [SubmoduleController::class, 'store'])->name('store');
            Route::get('/{submodule}/edit', [SubmoduleController::class, 'edit'])->name('edit');
            Route::put('/{submodule}', [SubmoduleController::class, 'update'])->name('update');
            Route::delete('/{submodule}', [SubmoduleController::class, 'destroy'])->name('destroy');
            Route::get('/{submodule}/status', [SubmoduleController::class, 'status'])->name('status');
        });

        // Submodule Items
        Route::prefix('submodule-item')->as('submodule-item.')->group(function () {
            Route::get('/', [SubmoduleItemController::class, 'index'])->name('index');
            Route::get('/create', [SubmoduleItemController::class, 'create'])->name('create');
            Route::post('/', [SubmoduleItemController::class, 'store'])->name('store');
            Route::get('/{submoduleItem}/edit', [SubmoduleItemController::class, 'edit'])->name('edit');
            Route::put('/{submoduleItem}', [SubmoduleItemController::class, 'update'])->name('update');
            Route::delete('/{submoduleItem}', [SubmoduleItemController::class, 'destroy'])->name('destroy');
            Route::get('/{submoduleItem}/status', [SubmoduleItemController::class, 'status'])->name('status');
        });

});
