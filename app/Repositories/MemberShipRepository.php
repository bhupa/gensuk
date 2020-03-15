<?php
namespace App\Repositories;


use App\Models\MemberShip;
use App\Models\Project;

Class MemberShipRepository extends BaseRepository {

    public function __construct(MemberShip $membership){

        $this->model = $membership;

    }

}
