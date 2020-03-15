<?php
namespace App\Repositories;

use App\Models\BlogCategorie;

Class BlogCategoriesRepository extends BaseRepository {

public function __construct(BlogCategorie $blogCategories){

    $this->model = $blogCategories;

}

}
