<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\Files\Gender;
use Inertia\Inertia;

class GenderController extends Controller
{
    public function index ()
    {
        return Inertia::render('Files/Genders/Index',[
            'genders' => Gender::orderBy('description')
                            ->get()
                            ->transform(function ($d) {
                                return [
                                    'id'                => $d->id,
                                    'description'       => $d->description,
                                    'created_by'        => $d->created_by
                                ];
                            }),
        ]);
    }

    public function create ()
    {
        return Inertia::render('Files/Genders/Create');
    }
}
