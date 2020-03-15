<?php
namespace App\Repositories;

use App\Models\Event;
use App\Models\Team;

Class EventRepository extends BaseRepository {

    public function __construct(Event $event){

        $this->model = $event;

    }

}
