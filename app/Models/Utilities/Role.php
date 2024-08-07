<?php

namespace App\Models\Utilities;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'code', 'created_by'
    ];

    public function createdBy () 
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
