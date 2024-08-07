<?php

namespace App\Models\Files;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BloodType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'description', 'slug', 'created_by'
    ];

    public function createdBy () 
    {
        return $this->belongsTo(User::class,'created_by','id');
    }
}
