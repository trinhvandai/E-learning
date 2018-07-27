<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelUser;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $user)
    {
        $this->modelUser = $user;
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
        return view('users.show', $selectedUser);
    }
}
