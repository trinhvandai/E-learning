<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursesUser;

class CoursesUserController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelCoursesUser;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(CoursesUser $coursesUser)
    {
        $this->modelCoursesUser = $coursesUser;
    }

    public function changeStatus(Request $request)
    {
        $data = $request->all();

        $result = $this->modelCoursesUser->changeCourseUser($data);

        return response()->json($result);
    }
}
