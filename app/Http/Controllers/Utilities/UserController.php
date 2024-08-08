<?php

namespace App\Http\Controllers\Utilities;
use App\Http\Controllers\Controller;
use App\Models\Files\BloodType;
use App\Models\Files\Gender;
use App\Models\User;
use App\Models\Utilities\Role;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index ()
    {
        return Inertia::render('Utilities/Users/Index',[
            'users' => 
                User::orderBy('last_name','desc')
                    ->get()
                    ->transform(function ($item) {
                        return [
                            'id'                => $item->id,
                            'name'              => $item->fullName(),
                            'email'             => $item->email,
                            'role'              => $item->role->name,
                            'created_at'        => $item->created_at->format('j F Y'),
                            'created_by'        => $item->createdBy->first_name.' '.$item->createdBy->last_name,
                            'can'   => [
                                'show' => [
                                    'visible'   => true,
                                    'route'     => route('users:show',$item->id)
                                ],
                                'edit' => [
                                    'visible'   => true,
                                    'route'     => route('users:edit',$item->id)
                                ],
                                'delete'            => [
                                    'visible'   => true,
                                    'route'     => route('roles:destroy', $item->id)
                                ]
                            ],
                        ];
                    }),
        ]);
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

    public function store (Request $request)
    {
 
        try {
            $validated = $this->validate($request,[
                'prefix'        => 'nullable',
                'suffix'        => 'nullable',
                'first_name'    => 'required|regex:/^[a-zA-Z]+$/u',
                'middle_name'   => 'nullable|regex:/^[a-zA-Z]+$/u',
                'last_name'     => 'required|regex:/^[a-zA-Z]+$/u',
                'contact'       => 'required',
                'gender.id'     => 'nullable|exists:genders,id',
                'blood_type.id' => 'nullable|exists:blood_types,id',
                'role.id'       => 'required|exists:roles,id',
                'email'         => 'required|email|unique:users,id',
                'birthday'      => 'nullable|date'
            ],$this->messages());
    
            $validated = $this->reassignment($validated);
            if(User::create($validated))
            {
                return back()->with('alert', ['type' => 'success', 'message' => 'Successfully Added.']);
            }

        }catch(Exception $e)
        {
            $msg = Arr::flatten(array_values($e->validator->messages()->messages()));
            return back()->with('alert', ['type' => 'error', 'message' => str_replace(',',' ',implode(', ', $msg))]);
        }
        
    }

    public function show (User $user)
    {
        return Inertia::render('Utilities/Users/Show',[
            'user' => [
                'id'            => $user->id,
                'name'          => $user->fullName(),
                'email'         => $user->email,
                'contact'       => $user->contact,
                'role'          => $user->role->name,
                'active'        => $user->is_active,
                'gender'        => $user->gender->description,
                'blood_type'    => $user->blood_type->description.' ( '.$user->blood_type->slug.' )',
                'birthday'      => date('j F Y', strtotime($user->birthday)),
                'age'           => $user->age(),
                'created_by'    => $user->createdBy->fullName(),
                'created_at'        => $user->created_at->format('j F Y'),
                'updated_at'        => $user->updated_at->format('j F Y') ?? $user->created_at->format('j F Y')
            ],

        ]);
    }


    public function edit (User $user)
    {
        return Inertia::render('Utilities/Users/Edit',[
            'user' => [
                'id'            => $user->id,
                'name'          => $user->fullName(),
                'first_name'    => $user->first_name,
                'middle_name'   => $user->middle_name,
                'last_name'     => $user->last_name,
                'prefix'        => $user->prefix ?? '',
                'suffix'        => $user->suffix ?? '',
                'email'         => $user->email,
                'contact'       => $user->contact,
                'birthday'      => $user->birthday,
                'gender'        => [
                    'id'    => $user->gender->id,
                    'label' => $user->gender->description
                ],
                'blood_type'    => [
                    'id'    => $user->blood_type->id,
                    'label' => $user->blood_type->slug
                ],
                'role'          => [
                    'id'    => $user->role->id,
                    'label' => $user->role->name,
                ]
            ],
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

    public function update (Request $request, User $user)
    {
        return dd($request);
    }
    
    public function doctors ()
    {
        return Inertia::render('Files/Doctors/Index');
    }

    public function patients ()
    {
        return Inertia::render('Files/Patients/Index');
    }


    public function reassignment($validated)
    {
        $validated['gender_id']     = $validated['gender']['id'];
        $validated['blood_type_id'] = $validated['blood_type']['id'];
        $validated['role_id']       = $validated['role']['id'];
        $validated['password']      = Hash::make(Str::password(16,true,true,false,false));
        $validated['created_by']    = Auth::user()->id;
        return $validated;
    }

    public function messages ()
    {
        return [
            'first_name.regex'  => 'Name must not include any numbers and special characters.',
            'last_name.regex'  => 'Name must not include any numbers and special characters.',
            'role.id.required'  => 'Role assignment is required. Please fill it up.'
        ];
    }

}
