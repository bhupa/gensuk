<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
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

    protected $table ='content';

    protected $fillable =[
        'title',
        'image',
        'is_active',
        'description',
        'short_description',
        'slug',
        'created_by'
    ];
    public function author(){
        return $this->belongsTo(User::class,'created_by');
    }
}
