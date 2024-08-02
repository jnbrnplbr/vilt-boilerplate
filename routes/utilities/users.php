<?php

use App\Http\Controllers\Utilities\UserController;
use Illuminate\Support\Facades\Route;


Route::get('users',[ UserController::class,'index'])->name('users:index');
Route::get('users/create',[ UserController::class,'create'])->name('users:create');