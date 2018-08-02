<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Notification;

class UserController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelUser;
    protected $modelNotification;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $user, Notification $notification)
    {
        $this->modelUser = $user;
        $this->modelNotification = $notification;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedUser = $this->modelUser->findUser($id);

        // Get difftime from last login to now.
        $diffTime = \Carbon\Carbon::parse($selectedUser->last_login)->diffForHumans();

        // Get all province from database.
        $selectProvince = \App\Models\Province::all()->pluck('name', 'id');

        $notifications = $this->modelNotification->getNotificationFollowUser($id);
        $countNotifications = $notifications->count();

        return view('users.show', compact([
            'selectedUser',
            'diffTime',
            'selectProvince',
            'countNotifications',
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $result = $this->modelUser->updateUser($data, $id);

        if ($result) {
            flash('Cập nhật thông tin thành công')->success();
        } else {
            flash('Cập nhật thông tin thất bại')->error();
        }

        return redirect()->route('users.show', $id);
    }
}
