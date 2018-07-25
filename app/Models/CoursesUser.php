<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CoursesUser extends Pivot
{
    protected $table = 'courses_users';

    public function tests()
    {
        return $this->hasMany('App\Models\Test');
    }
}
