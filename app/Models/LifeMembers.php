<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LifeMembers extends Model
{
    USE SoftDeletes;

    protected $table='life_members';
    protected $fillable =[

        'team_id',
        'is_active',
        'display_orders'


    ];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
}
