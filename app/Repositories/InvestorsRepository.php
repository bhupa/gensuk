<?php
/**
 * Created by PhpStorm.
 * User: Amit Shrestha <amitshrestha221@gmail.com> <https://amitstha.com.np>
 * Date: 11/11/18
 * Time: 11:15 AM
 */

namespace App\Repositories;



use App\Models\Investor;
use App\Models\Volunter;

class InvestorsRepository extends BaseRepository
{
    public function __construct(Investor $investor)
    {
        $this->model = $investor;
    }
}
