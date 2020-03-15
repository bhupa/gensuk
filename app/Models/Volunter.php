<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunter extends Model
{
    protected $table ='volunter';

    protected $fillable =[
        'name',
        'email',
        'phone',
        'message'
    ];
}
