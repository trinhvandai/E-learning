<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    
    protected $table = 'courses';

    const PAGINATION = 8;

    protected $fillable = [
        'name',
        'lecture_count',
        'time',
        'level',
        'description',
        'category_id',
    ];

    public $sortable = [
        'rate',
        'level',
        'like',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'courses_users')
            ->using('App\Models\CoursesUser');
    }

    public function getCourse()
    {
        $builder = Course::orderBy('updated_at', 'DESC');
        
        return $builder->paginate(self::PAGINATION);
    }

    /**
     * Get the list of the joined people including teacher and student
     *
     * @param  int  $courseId
     * @return int $users
     */
    public function getParticipantList($courseId)
    {
        $course = Course::findOrFail($courseId);

        return $course->users;
    }

    public function findCourse($id)
    {
        return Course::findOrFail($id);
    }

    public function createCourse($data)
    {
        return Course::create($data);
    }

    public function updateCourse($data, $id)
    {
        $result = Course::findOrFail($id)->update($data);

        return $result;
    }

    public function deleteCourse($id)
    {
        $result = Course::findOrFail($id)->delete();

        return $result;
    }
}
