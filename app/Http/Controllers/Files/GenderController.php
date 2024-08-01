<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\Files\GenderRequest;
use App\Models\Files\Gender;
use Illuminate\Support\Facades\Auth;
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

    public function store (GenderRequest $request)
    {
        if(Gender::create(['description' => $request->description, 'created_by' => Auth::user()->id]))
        {
            return back()->with('alert',['type' => 'success', 'message' => 'Successfully Added.']);
        }

        return back()->with('error',['type' => 'error', 'message' => 'Something went wrong.']);
    }
}
