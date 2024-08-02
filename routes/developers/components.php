<?php

use App\Http\Controllers\Developers\ComponentController;
use Illuminate\Support\Facades\Route;

Route::get('form-field',[ ComponentController::class,'index'])->name('dev:components:form-field');