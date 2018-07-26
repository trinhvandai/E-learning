<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;
    
    protected $table = 'tests';

    public function courseUser()
    {
        return $this->belongsTo('App\Models\CourseUser');
    }

    public function testElements()
    {
        return $this->hasMany('App\Models\TestElement');
    }
}
