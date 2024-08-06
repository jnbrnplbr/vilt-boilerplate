<?php

use App\Http\Controllers\Files\GenderController;
use Illuminate\Support\Facades\Route;


Route::get('genders',[ GenderController::class,'index'])->name('genders:index');
Route::get('genders/create',[ GenderController::class,'create'])->name('genders:create');
Route::post('genders',[ GenderController::class,'store'])->name('genders:store');
Route::get('genders/{gender}', [GenderController::class, 'show'])->name('genders:show');
Route::get('genders/{gender}/edit',[ GenderController::class,'edit'])->name('genders:edit');
Route::put('genders/{gender}',[GenderController::class, 'update'])->name('genders:update');
Route::delete('genders/{gender}', [GenderController::class, 'destroy'])->name('genders:destroy');