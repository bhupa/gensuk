<?php
namespace App\Repositories;


use App\Models\LifeMembers;

Class LifeMembersRepository extends BaseRepository {

    public function __construct(LifeMembers $lifemember){

        $this->model = $lifemember;

    }

}
