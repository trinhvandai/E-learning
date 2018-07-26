<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OnlineClassroom extends Model
{
    use SoftDeletes;
    
    protected $table = 'online_classrooms';

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'online_classrooms_users')
            ->withTimestamps();
    }
}
