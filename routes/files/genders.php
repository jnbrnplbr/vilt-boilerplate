<?php

use App\Http\Controllers\Files\GenderController;
use Illuminate\Support\Facades\Route;


Route::get('genders',[ GenderController::class,'index'])->name('genders:index');
Route::get('genders/create',[ GenderController::class,'create'])->name('genders:create');
Route::post('genders',[ GenderController::class,'store'])->name('genders:store');