<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\CoursesUser;

class Notification extends Model
{
    use SoftDeletes;

    protected $table = 'notifications';

    protected $dates = ['deleted_at'];

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
        $data['code'] = $data['course_id'] . '-' . $data['user_id'];
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

    public function getUnreadNotificationFollowUser($id)
    {
        return Notification::where('user_id', $id)->where('seen', 0)->orderBy('updated_at', 'DESC')->get();
    }

    public function updateReadStatus($data)
    {
        return Notification::where('id', $data['id'])->update(['seen' => true]);
    }

    public function acceptCourseRequest($data)
    {
        $position = strpos($data['code'], '-');
        $courseId = substr($data['code'], 0, $position);
        $userId = substr($data['code'], $position + 1, strlen($data['code']));

        CoursesUser::where('course_id', $courseId)->where('user_id', $userId)->update(['active' => '2']);

        return CoursesUser::where('course_id', $courseId)->where('user_id', $userId)->first();
    }

    public function deleteNotification($data)
    {
        return Notification::where('id', $data['id'])->firstOrFail()->delete();
    }
}
