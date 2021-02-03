<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;

Route::get('session', [SessionController::class, 'index'])->middleware('rut')->name('session.index');
Route::post('session', [SessionController::class, 'store'])->name('session.store');
Route::post('session/logout', [SessionController::class, 'logout'])->name('session.logout');