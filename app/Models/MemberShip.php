<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberShip extends Model
{
    USE SoftDeletes;

    protected $table='membership';
    protected $fillable =[
        'name',
        'address',
        'mobile',
        'telephone',
        'email',
        'dob',
        'gender',
        'fee',
        'membership',
        'message',
        'postal_code',
    ];
}
