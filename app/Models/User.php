<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function specializes()
    {
        return $this->belongsToMany('App\Models\Specialize');
    }

    public function onlineClassrooms()
    {
        return $this->belongsToMany('App\Models\OnlineClassroom', 'online_classrooms_users')
            ->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'courses_users')
            ->using('App\Models\CoursesUser');
    }

    const ROLE_TEACHER = 1;
    const ROLE_STUDENT = 2;

    public static $roles = [
        self::ROLE_TEACHER => 'Teacher',
        self::ROLE_STUDENT => 'Student',
    ];
}
