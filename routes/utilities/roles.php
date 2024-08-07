<?php

use App\Http\Controllers\Utilities\RoleController;
use Illuminate\Support\Facades\Route;


Route::get('roles',[ RoleController::class,'index'])->name('roles:index');
Route::get('roles/create',[ RoleController::class,'create'])->name('roles:create');
Route::post('roles',[ RoleController::class,'store'])->name('roles:store');
Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles:show');
Route::get('roles/{role}/edit',[ RoleController::class,'edit'])->name('roles:edit');
Route::put('roles/{role}',[RoleController::class, 'update'])->name('roles:update');
Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles:destroy');