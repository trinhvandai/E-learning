<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelNotification;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(Notification $notification)
    {
        $this->modelNotification = $notification;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $notifications = $this->modelNotification->getNotificationFollowUser($id);

        return view('notifications.index', compact(
            'notifications'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $exists = $this->modelNotification->existsNotification($data);

        if (!$exists) {
            $this->modelNotification->createCourseRequestNotification($data);
        } else {
            $this->modelNotification->deleteCourseRequestNotification($data);
        }
    }

    public function changeReadStatus(Request $request)
    {
        $data = $request->all();

        $result = $this->modelNotification->updateReadStatus($data);

        return response()->json($result);
    }

    public function acceptCourseRequest(Request $request)
    {
        $data = $request->all();

        $result = $this->modelNotification->acceptCourseRequest($data);
        $courseName = \App\Models\Course::find($result->course_id)->name;
        $userName = \App\Models\User::find($result->user_id)->name;

        return response()->json(['course_name' => $courseName, 'user_name' => $userName]);
    }

    public function deleteNotification(Request $request)
    {
        $data = $request->all();

        $this->modelNotification->deleteNotification($data);

        return response()->json($data);
    }
}
