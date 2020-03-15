<?php
namespace App\Repositories;

use App\Models\Content;

Class ContentRepository extends BaseRepository {

public function __construct(Content $content){

    $this->model = $content;

}

}
