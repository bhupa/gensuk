<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{

    USE SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected $table='team';
    protected $fillable =[
        'name',
        'position',
        'created_by',
        'is_active',
        'display_orders',
        'slug',
        'image',
        'short_description',
        'facebook',
        'twitter',
        'insta',
        'email',
        'date'

    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function member(){
        return $this->hasOne(LifeMembers::class,'team_id');
    }
}
