<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Category;
use App\Models\CoursesUser;
use Response;
use View;
use Auth;

class CourseController extends Controller
{
    /**
     * The user model instance.
     */
    protected $modelUser;
    protected $modelCourse;
    protected $modelCategory;
    protected $modelCoursesUser;

    /**
     * Create a new controller instance.
     *
     * @param  User  $users
     * @return void
     */
    public function __construct(User $user, Course $course, Category $category, CoursesUser $coursesUser)
    {
        $this->modelUser = $user;
        $this->modelCourse = $course;
        $this->modelCategory = $category;
        $this->modelCoursesUser = $coursesUser;
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
        $activeCourse = null;

        if (!empty($selectedCourse->user)) {
            foreach ($selectedCourse->user as $user) {
                if ($user->role == 1) {
                    $selectedCourse->setAttribute('teacher_name', $user->name);
                    $selectedCourse->setAttribute('teacher_phone', $user->phone);
                }
            }
        }

        $currentUserId = Auth::user()->id;

        if (null !== $this->modelCoursesUser->findCoursesUser($selectedCourse->id, $currentUserId)) {
            $activeCourse = $this->modelCoursesUser->findCoursesUser($selectedCourse->id, $currentUserId)->active;
        }
        // dd($activeCourse);

        return view('courses.show', compact(
            'selectedCourse',
            'currentUserId',
            'activeCourse'
        ));
    }
}
