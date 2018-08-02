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
}
