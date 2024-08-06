<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Http\Requests\Files\GenderRequest;
use App\Models\Files\Gender;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
                                    'created_by'        => $d->created_by,
                                    'can'   => [
                                        'show' => [
                                            'visible'   => true,
                                            'route'     => route('genders:show',$d->id)
                                        ],
                                        'edit' => [
                                            'visible'   => true,
                                            'route'     => route('genders:edit',$d->id)
                                        ],
                                        'delete'            => [
                                            'visible'   => true,
                                            'route'     => route('genders:destroy', $d->id)
                                        ]
                                    ],
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
        try{
            $validated = $this->validate($request, $this->rules());

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

    public function show (Gender $gender)
    {
        return Inertia::render('Files/Genders/Show',[
            'gender' => [
                'id'            => $gender->id,
                'description'   => $gender->description,
                'created_by'    => $gender->created_by,
                'created_at'    => $gender->created_at,
                'updated_at'    => $gender->updated_at
            ]
        ]);
    }

    public function edit (Gender $gender)
    {
        return Inertia::render('Files/Genders/Edit',[
            'gender' => [
                'id'            => $gender->id,
                'description'   => $gender->description,
                'created_by'    => $gender->created_by,
                'created_at'    => $gender->created_at
            ]
        ]);
    }

    public function update (Gender $gender, Request $request)
    {
        try{
            $validated = $this->validate($request, $this->rules());

            if($gender->update($validated) && $gender->touch())
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Updated.']);
            }
            
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
    }

    public function destroy (Gender $gender)
    {
        if($gender->delete())
        {
            return redirect(route('genders:index'))->with('alert', ['type' => 'success', 'message' => 'Successfully Deleted.']);
        }

        return back()->with('alert', ['type'=>'error', 'message'=>'An error occured.']);
    }

    public function rules ()
    {
        return [
            'description' => 'required'
        ];
    }

}
