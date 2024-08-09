<?php

use App\Http\Controllers\Utilities\UserController;
use Illuminate\Support\Facades\Route;


Route::get('doctors',[ UserController::class,'doctors'])->name('users:doctors');
Route::get('patients',[ UserController::class,'patients'])->name('users:patients');
Route::get('assistants',[ UserController::class,'assistants'])->name('users:assistants');