<?php

use App\Http\Controllers\Files\GenderController;
use Illuminate\Support\Facades\Route;


Route::get('genders',[ GenderController::class,'index'])->name('genders:index');