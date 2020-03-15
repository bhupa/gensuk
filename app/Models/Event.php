<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    USE SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $table='event';
    protected $fillable =[
        'title',
        'created_by',
        'is_active',
        'slug',
        'image',
        'short_description',
        'date',
        'description',
        'volunters'
    ];

    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
