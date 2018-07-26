<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestElement extends Model
{
    protected $table = 'test_elements';

    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }
}
