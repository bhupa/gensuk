<?php
namespace App\Repositories;

use App\Models\Blog;

Class BlogRepository extends BaseRepository {

public function __construct(Blog $blog){

    $this->model = $blog;

}

}
