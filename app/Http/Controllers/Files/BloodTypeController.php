<?php

namespace App\Http\Controllers\Files;

use App\Http\Controllers\Controller;
use App\Models\Files\BloodType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class BloodTypeController extends Controller
{
    public function index ()
    {
        return Inertia::render('Files/BloodTypes/Index',[
            'blood_types' => BloodType::orderBy('description')
                            ->get()
                            ->transform(function ($d) {
                                return [
                                    'id'                => $d->id,
                                    'description'       => $d->description,
                                    'slug'              => $d->slug,
                                    'created_by'        => $d->createdBy->first_name.' '.$d->createdBy->last_name,
                                    'can'   => [
                                        'show' => [
                                            'visible'   => true,
                                            'route'     => route('blood_types:show',$d->id)
                                        ],
                                        'edit' => [
                                            'visible'   => true,
                                            'route'     => route('blood_types:edit',$d->id)
                                        ],
                                        'delete'            => [
                                            'visible'   => true,
                                            'route'     => route('blood_types:destroy', $d->id)
                                        ]
                                    ],
                                ];
                            }),
        ]);
    }

    public function create ()
    {
        return Inertia::render('Files/BloodTypes/Create');
    }

    public function store (Request $request)
    {
        try{
            $validated = $this->validate($request, $this->rules());

            $validated['created_by'] = Auth::user()->id;

            if(BloodType::create($validated))
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Added.']);
            }
            
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
    }

    public function show (BloodType $blood_type)
    {
        return Inertia::render('Files/BloodTypes/Show',[
            'blood_type' => [
                'id'            => $blood_type->id,
                'description'   => $blood_type->description,
                'slug'          => $blood_type->slug,
                'created_by'    => $blood_type->created_by,
                'created_at'    => $blood_type->created_at,
                'updated_at'    => $blood_type->updated_at
            ]
        ]);
    }

    public function edit (BloodType $blood_type)
    {
        return Inertia::render('Files/BloodTypes/Edit',[
            'blood_type' => [
                'id'            => $blood_type->id,
                'description'   => $blood_type->description,
                'slug'          => $blood_type->slug,
            ]
        ]);
    }

    public function update (Request $request, BloodType $blood_type)
    {
        try{
            $validated = $this->validate($request, [
                'description' => 'required',
                'slug'        => ['required', 'unique:blood_types,slug,'.$blood_type->id.',id']
            ]);

            if($blood_type->update($validated) && $blood_type->touch())
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Updated.']);
            }
            
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
    }

    public function destroy (BloodType $blood_type)
    {
        if($blood_type->delete())
        {
            return redirect(route('blood_types:index'))->with('alert', ['type' => 'success', 'message' => 'Successfully Deleted.']);
        }

        return back()->with('alert', ['type'=>'error', 'message'=>'An error occured.']);
    }

    public function rules ()
    {
        return [
            'description' => 'required',
            'slug'        => ['required', 'unique:blood_types']
        ];
    }
}


