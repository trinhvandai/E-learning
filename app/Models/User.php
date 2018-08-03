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
        'address',
        'phone',
        'birthday',
        'role',
        'avatar',
        'working_place',
        'grade',
        'active',
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

    /**
     * Get the notifications for the notification.
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    const ROLE_ADMIN = 0;
    const ROLE_TEACHER = 1;
    const ROLE_STUDENT = 2;

    public static $roles = [
        self::ROLE_ADMIN => 'Admin',
        self::ROLE_TEACHER => 'Teacher',
        self::ROLE_STUDENT => 'Student',
    ];

    const GRADE_1 = 1;
    const GRADE_2 = 2;
    const GRADE_3 = 3;

    public static $grades = [
        self::GRADE_1 => 'Grade 1',
        self::GRADE_2 => 'Grade 2',
        self::GRADE_3 => 'Grade 3',
    ];

    /**
     * Get user model by id.
     *
     * @param id
     * @return User
     */
    public function findUser($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Get model user from database.
     *
     * @param $id
     * @return User $user
     */
    public function updateUser($data, $id)
    {
        $selectedUser = User::find($id);

        if (isset($data['update_info'])) {
            if (isset($data['cancel_value'])) {
                $data['avatar'] = $selectedUser->avatar;
            } elseif (isset($data['delete_value'])) {
                $data['avatar'] = 'images/avatar/basic-avatar.png';
            } else {
                $data['avatar'] = 'images/avatar/' . $data['avatar'];
            }
        }

        if (isset($data['update_info'])) {
            if (isset($data['old_password'])) {
                $hasher = app('hash');
                $result = $hasher->check($data['old_password'], $selectedUser->password);

                if (!$result) {
                    return false;
                }
                $data['password'] = Hash::make($data['new_password']);
            }

            return $selectedUser->update($data);
        }
    }
}
