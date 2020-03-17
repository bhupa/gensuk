<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    protected $table ='investors';

    protected $fillable =[
        'name',
        'email',
        'phone',
        'message',
        'project_id'
    ];

    public function project() {

        return $this->belongsTo(Project::class,'project_id');
    }
}
