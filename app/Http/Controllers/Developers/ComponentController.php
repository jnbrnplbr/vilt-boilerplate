<?php

namespace App\Http\Controllers\Developers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class ComponentController extends Controller
{
    public function index () 
    {
        return Inertia::render('Developer/Components/FormField');
    }
}
