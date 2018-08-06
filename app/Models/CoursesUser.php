<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Embed\Embed;

class CoursesUser extends Pivot
{
    use SoftDeletes;

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
        $builder = CoursesUser::where('course_id', $id)
                                ->whereNotNull('uploaded_file_title')
                                ->where('uploaded_file_active', 1);
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

    public function createLecture($data, $id)
    {
        $data['course_id'] = $id;
        $data['user_id'] = \Auth::user()->id;
        $data['uploaded_file_active'] = 0;

        $embed = Embed::create($data['uploaded_file_link']);
        $providers = $embed->getProviders();
        $html = $providers['html'];
        $bag = $html->getBag();
        $duration = $bag->get('duration');
        $data['uploaded_file_time'] = self::covtime($duration);

        return CoursesUser::create($data);
    }

    public function updateLecture($data, $id)
    {
        $data['course_id'] = $id;
        $data['user_id'] = \Auth::user()->id;
        $data['uploaded_file_active'] = 0;
        $lectureId = $data['uploaded_file_id'];
        unset($data['uploaded_file_id']);

        return CoursesUser::findOrFail($lectureId)->update($data);
    }

    public function deleteLecture($data)
    {
        return CoursesUser::findOrFail($data['uploaded_file_id'])->delete();
    }

    public function covtime($youtubeTime)
    {
        preg_match_all('/(\d+)/', $youtubeTime, $parts);
    
        // Put in zeros if we have less than 3 numbers.
        if (count($parts[0]) == 1) {
            array_unshift($parts[0], '0', '0');
        } elseif (count($parts[0]) == 2) {
            array_unshift($parts[0], '0');
        }
    
        $secInit = $parts[0][2];
        $seconds = $secInit%60;
        $secondsOverflow = floor($secInit/60);
    
        $minInit = $parts[0][1] + $secondsOverflow;
        $minutes = ($minInit)%60;
        $minutesOverflow = floor(($minInit)/60);
    
        $hours = $parts[0][0] + $minutesOverflow;
    
        if ($hours != 0) {
            return $hours.':'.$minutes.':'.$seconds;
        } else {
            return '00:' . $minutes.':'.$seconds;
        }
    }
}
