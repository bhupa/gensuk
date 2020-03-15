<?php
namespace App\Repositories;

use App\Models\Setting;

Class SettingRepository extends BaseRepository {

    public function __construct(Setting $setting){

        $this->model = $setting;

    }

}
