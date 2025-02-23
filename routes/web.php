<?php

use Illuminate\Support\Facades\Route; // Импорт класса Route
use App\Http\Controllers\Admin\MortgageController as AdminMortgageController;
use App\Http\Controllers\Public\MortgageController as PublicMortgageController;

Route::prefix('admin')->group(function () {
    Route::resource('mortgages', AdminMortgageController::class);
});

Route::prefix('public')->group(function () {
    Route::get('mortgages', [PublicMortgageController::class, 'index'])->name('public.mortgages.index');
    Route::get('mortgages/{id}', [PublicMortgageController::class, 'show'])->name('public.mortgages.show');
});
