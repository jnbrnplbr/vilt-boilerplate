<?php

namespace App\Http\Controllers\Utilities;
use App\Http\Controllers\Controller;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index ()
    {
        return Inertia::render('Utilities/Users/Index');
    }

    public function doctors ()
    {
        return Inertia::render('Files/Doctors/Index');
    }

    public function patients ()
    {
        return Inertia::render('Files/Patients/Index');
    }

    public function create ()
    {
        return Inertia::render('Utilities/Users/Create');
    }
}
