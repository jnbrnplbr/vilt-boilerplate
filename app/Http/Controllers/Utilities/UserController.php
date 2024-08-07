<?php

namespace App\Http\Controllers\Utilities;
use App\Http\Controllers\Controller;
use App\Models\Files\BloodType;
use App\Models\Files\Gender;
use App\Models\Utilities\Role;
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
        return Inertia::render('Utilities/Users/Create', [
            'roles' => Role::orderBy('name')
                        ->get()
                        ->transform(fn ($item) => [
                            'id'    => $item->id,
                            'label'  => $item->name,
                        ]),
            'genders' => Gender::orderBy('description')
                        ->get()
                        ->transform(fn ($item) => [
                            'id'    => $item->id,
                            'label' => $item->description,
                        ]),
            'blood_types' => BloodType::orderBy('slug')
                        ->get()
                        ->transform(fn ($item) => [
                            'id'    => $item->id,
                            'label'  => $item->slug
                        ])
        ]);
    }
}
