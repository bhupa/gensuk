<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{


    protected $table ='contact';

    protected $fillable =[
        'name',
        'email',
        'phone',
        'message'
    ];

}
