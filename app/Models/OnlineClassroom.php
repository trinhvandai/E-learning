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

    /**
     * Get the teacher who creates online classroom
     *
     * @param  int  $classroomId
     * @return int $teacherid
     */
    public function getTeacher($classroomId)
    {
        $classroom = OnlineClassroom::findOrFail($classroomId);

        foreach ($classroom->users as $user) {
            if ($user->role == 1) {
                return $user;
            }
        }

        return null;
    }
}
