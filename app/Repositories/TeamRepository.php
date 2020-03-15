<?php
namespace App\Repositories;

use App\Models\Team;

Class TeamRepository extends BaseRepository {

    public function __construct(Team $team){

        $this->model = $team;

    }

}
