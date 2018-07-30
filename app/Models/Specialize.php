<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialize extends Model
{
    use SoftDeletes;
    
    protected $table = 'specializes';

    protected $fillable = [
        'name',
        'teaching_grade',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'specializes_users');
    }

    public function createSpecialize($data)
    {
        return Specialize::create($data);
    }

    public function updateSpecialize($data, $id)
    {
        $result = Specialize::findOrFail($id)->update($data);

        return $result;
    }

    public function deleteSpecialize($id)
    {
        $result = Specialize::findOrFail($id)->delete();

        return $result;
    }
}
