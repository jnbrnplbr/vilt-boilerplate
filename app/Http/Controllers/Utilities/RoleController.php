<?php

namespace App\Http\Controllers\Utilities;
use App\Http\Controllers\Controller;
use App\Models\Utilities\Role;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class RoleController extends Controller
{
    public function index ()
    {
        return Inertia::render('Utilities/Roles/Index',[
            'roles' => 
                Role::orderBy('description')
                    ->get()
                    ->transform(function ($d) {
                        return [
                            'id'                => $d->id,
                            'name'              => $d->name,
                            'description'       => $d->description,
                            'code'              => $d->code,
                            'created_by'        => $d->createdBy->first_name.' '.$d->createdBy->last_name,
                            'can'   => [
                                'show' => [
                                    'visible'   => true,
                                    'route'     => route('roles:show',$d->id)
                                ],
                                'edit' => [
                                    'visible'   => true,
                                    'route'     => route('roles:edit',$d->id)
                                ],
                                'delete'            => [
                                    'visible'   => true,
                                    'route'     => route('roles:destroy', $d->id)
                                ]
                            ],
                        ];
                    }),
        ]);
    }

    public function create ()
    {
        return Inertia::render('Utilities/Roles/Create');
    }

    public function store (Request $request)
    {
        try{
            $validated = $this->validate($request, $this->rules());

            $validated['created_by'] = Auth::user()->id;

            if(Role::create($validated))
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Added.']);
            }
            
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
    }

    public function show (Role $role)
    {
        return Inertia::render('Utilities/Roles/Show',[
            'role' => [
                'id'            => $role->id,
                'name'          => $role->name,
                'description'   => $role->description,
                'code'          => $role->code,
                'created_by'    => $role->created_by,
                'created_at'    => $role->created_at,
                'updated_at'    => $role->updated_at
            ]
        ]);
    }

    public function edit (Role $role)
    {
        return Inertia::render('Utilities/Roles/Edit',[
            'role' => [
                'id'            => $role->id,
                'description'   => $role->description,
                'code'          => $role->code,
                'name'          => $role->name
            ]
        ]);
    }

    public function update (Request $request, Role $role)
    {
        try{
            $validated = $this->validate($request, [
                'name'          => 'required',
                'description'   => 'required',
                'code'          => ['required', 'unique:roles,code,'.$role->id.',id']
            ]);

            if($role->update($validated) && $role->touch())
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Updated.']);
            }
        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
    }

    public function destroy (Role $role)
    {
        if($role->delete())
        {
            return redirect(route('roles:index'))->with('alert', ['type' => 'success', 'message' => 'Successfully Deleted.']);
        }

        return back()->with('alert', ['type'=>'error', 'message'=>'An error occured.']);
    }

    public function rules ()
    {
        return [
            'name'          => 'required',
            'description' => 'required',
            'code'        => ['required', 'unique:roles']
        ];
    }
}
