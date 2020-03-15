<?php
namespace App\Repositories;


use App\Models\Gallery;

Class GalleryRepository extends BaseRepository {

    public function __construct(Gallery $gallery){

        $this->model = $gallery;

    }

}
