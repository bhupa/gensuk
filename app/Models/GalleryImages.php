<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GalleryImages extends Model
{
    USE SoftDeletes;

    protected $table='gallery_images';
    protected $fillable =[
        'title',
        'gallery_id',
        'image',
    ];

    public function gallery(){
        return $this->belongsTo(Gallery::class,'gallery_id');
    }
}
