<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use Sluggable;
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $table='gallery';
    protected $fillable =[
        'title',
        'is_active',
        'slug',
        'image',
    ];

    public function images(){
        return $this->hasMany(GalleryImages::class,'gallery_id');
    }

}
