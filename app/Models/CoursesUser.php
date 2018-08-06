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

    public function findLectureFollowCourse($id)
    {
        $builder = CoursesUser::where('course_id', $id)->whereNotNull('uploaded_file_title');
        $courses = $builder->get();
        $teacherId = [];

        foreach ($courses as $course) {
            if (\App\Models\User::find($course->user_id)->role === 1) {
                array_push($teacherId, $course->user_id);
            }
        }

        return $builder->whereIn('user_id', $teacherId)->get();
    }

    public function getTeacherFollowCourse($id)
    {
        $selectedCourse = \App\Models\Course::findOrFail($id);

        foreach ($selectedCourse->user as $user) {
            if ($user->role == 1) {
                return $user;
            }
        }
    }
}
