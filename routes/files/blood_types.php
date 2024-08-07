<?php

use App\Http\Controllers\Files\BloodTypeController;
use Illuminate\Support\Facades\Route;


Route::get('blood_types',[ BloodTypeController::class,'index'])->name('blood_types:index');
Route::get('blood_types/create',[ BloodTypeController::class,'create'])->name('blood_types:create');
Route::post('blood_types',[ BloodTypeController::class,'store'])->name('blood_types:store');
Route::get('blood_types/{blood_type}', [BloodTypeController::class, 'show'])->name('blood_types:show');
Route::get('blood_types/{blood_type}/edit',[ BloodTypeController::class,'edit'])->name('blood_types:edit');
Route::put('blood_types/{blood_type}',[BloodTypeController::class, 'update'])->name('blood_types:update');
Route::delete('blood_types/{blood_type}', [BloodTypeController::class, 'destroy'])->name('blood_types:destroy');