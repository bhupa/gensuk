<?php
namespace App\Repositories;

use App\Models\ContentBanner;

Class ContentBannerRepository extends BaseRepository {

public function __construct(ContentBanner $content){

    $this->model = $content;

}

}
