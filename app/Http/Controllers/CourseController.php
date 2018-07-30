<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use Response;
use View;

class CourseController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelUser;
    protected $modelCourse;
    protected $modelCategory;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $user, Course $course, Category $category)
    {
        $this->modelUser = $user;
        $this->modelCourse = $course;
        $this->modelCategory = $category;
    }

    /**
     * Display a listing of the courses.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = $this->modelCourse->getCourse();
        $categories = $this->modelCategory->getAllCategory();

        foreach ($courses as $course) {
            if (!empty($course->user)) {
                foreach ($course->user as $user) {
                    if ($user->role == 1) {
                        $course->setAttribute('teacher_name', $user->name);
                    }
                }
            }
        }

        return view('courses.index', compact(
            'courses',
            'categories'
        ));
    }

    /**
     * Display a course of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $selectedCourse = $this->modelCourse->findCourse($id);
        
        return view('courses.show', compact(
            'selectedCourse'
        ));
    }
}
