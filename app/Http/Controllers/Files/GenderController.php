<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\Files\GenderRequest;
use App\Models\Files\Gender;
use Exception;
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
            ]);

            $validated['created_by'] = 1;

            if(Gender::create($validated))
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Add.']);
            }
            
        }catch(Exception $e)
        {
            $msgs = array();
            foreach($e->validator->messages()->messages() as $m)
            {
                array_push($msgs,['type' => 'error', 'message' => $m[0]]);
            }

            return back()->with('alert',(object)$msgs);

        }

        // if(Gender::create(['description' => $request->description, 'created_by' => Auth::user()->id]))
        // {
        //     return back()->with('alert',['type' => 'success', 'message' => 'Successfully Added.']);
        // }
        // return back()->with('error',['type' => 'error', 'message' => 'Something went wrong.']);
    }
}
