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

    public function changeCourseUser($data)
    {
        $exists = CoursesUser::where('course_id', $data['course_id'])->where('user_id', $data['user_id'])->first();
        if (!$exists) {
            $data['active'] = 1;

            return CoursesUser::create($data);
        }

        if ($exists->active === 1) {
            return $exists->delete();
        }
    }

    public function findCoursesUser($courseId, $userId)
    {
        return CoursesUser::where('course_id', $courseId)->where('user_id', $userId)->first();
    }
}
