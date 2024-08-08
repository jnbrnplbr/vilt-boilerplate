<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Files\BloodType;
use App\Models\Files\Gender;
use App\Models\Utilities\Role;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'prefix',
        'suffix',
        'first_name',
        'middle_name',
        'last_name',
        'contact',
        'birthday',
        'blood_type_id',
        'contact_id',
        'gender_id',
        'role_id',
        'created_by',
        'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function age()
    {
        return Carbon::parse(strtotime($this->attributes['birthday']))->age;
    }

    public function fullName ()
    {
        return $this->last_name.', '.$this->first_name;
    }

    public function createdBy () 
    {
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function role ()
    {
        return $this->belongsTo(Role::class);
    }

    public function gender ()
    {
        return $this->belongsTo(Gender::class);
    }
    
    public function blood_type ()
    {
        return $this->belongsTo(BloodType::class);
    }
}
