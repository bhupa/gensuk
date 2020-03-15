<?php
namespace App\Repositories;



use App\Models\GalleryImages;

Class GalleryImagesRepository extends BaseRepository {

    public function __construct(GalleryImages $galleryImages){

        $this->model = $galleryImages;

    }

}
