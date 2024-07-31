<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class GenderController extends Controller
{
    public function index ()
    {
        return Inertia::render('Files/Genders/Index');
    }
}
