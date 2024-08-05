<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\Files\GenderRequest;
use App\Models\Files\Gender;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
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

    public function store (Request $request)
    {

            // $validated = Request::validate([
            //     'description'   => ['required'],
            // ]);

            // $validated['created_by'] = 1;
            
            // if(Gender::create($validated))
            // {
            //     return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Added.']);
            // }
        try{
            $validated = Request::validate([
                'description'   => ['required'],
                // 'test'  => ['required']
            ]);

            $validated['created_by'] = 1;

            if(Gender::create($validated))
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Added.']);
            }
            
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }


    }
}
