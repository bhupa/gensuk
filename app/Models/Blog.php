<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


    protected $table='blog';





    protected $fillable =[
        'title',
        'create_by',
        'category_id',
        'slug',
        'is_active',
        'description',
        'image',
        'short_description',
        'view'
    ];

    public function author(){
        return $this->belongsTo(User::class,'create_by');
    }

    public function category(){
        return $this->belongsTo(BlogCategorie::class,'category_id');
    }
}
