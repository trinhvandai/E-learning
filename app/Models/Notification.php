<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'content',
        'user_id',
        'code',
        'seen',
    ];

    /**
     * Get the user that owns the notifications.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function createCourseRequestNotification($data)
    {
        $data['code'] = $data['course_id'] . $data['user_id'];
        $data['content'] = __('course_request_noti_p1') .
        \App\Models\User::find($data['user_id'])->name .
        __('course_request_noti_p2') .
        \App\Models\Course::find($data['course_id'])->name .
        __('course_request_noti_p3');
        $data['user_id'] = $data['teacher_id'];
        
        Notification::create($data);
    }

    public function existsNotification($data)
    {
        $generateCode = $data['course_id'] . $data['user_id'];
        $exists = Notification::where('user_id', $data['teacher_id'])->where('code', $generateCode)->first();

        if (!$exists) {
            return false;
        }

        return true;
    }

    public function deleteCourseRequestNotification($data)
    {
        $generateCode = $data['course_id'] . $data['user_id'];
        $selectedNotification = Notification::where('user_id', $data['teacher_id'])
                                            ->where('code', $generateCode)->first();

        $selectedNotification->delete();
    }

    public function getNotificationFollowUser($id)
    {
        return Notification::where('user_id', $id)->orderBy('updated_at', 'DESC')->get();
    }
}
