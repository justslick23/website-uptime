<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/* Route::get('/', function () {
    return view('dashboard');
});
 */

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');