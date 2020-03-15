<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 11/11/18
 * Time: 11:15 AM
 */

namespace App\Repositories;



use App\Models\Volunter;

class VolunterRepository extends BaseRepository
{
    public function __construct(Volunter $volunter)
    {
        $this->model = $volunter;
    }
}
