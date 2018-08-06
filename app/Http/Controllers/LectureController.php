<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoursesUser;
use App\Http\Requests\CreateLectureRequest;
use Embed\Embed;

class LectureController extends Controller
{

    protected $modelCoursesUser;

    public function __construct(CoursesUser $coursesUser)
    {
        $this->modelCoursesUser = $coursesUser;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $lectures = $this->modelCoursesUser->findLectureFollowCourse($id);
        $courseName = \App\Models\Course::findOrFail($id)->name;

        return view('lectures.index', compact(
            'lectures',
            'id',
            'courseName'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLectureRequest $request, $id)
    {
        $createdLecture = $this->modelCoursesUser->createLecture($request->all(), $id);

        return response()->json($createdLecture);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $lectureId)
    {
        $link = CoursesUser::find($lectureId)->uploaded_file_link;
        $description = CoursesUser::find($lectureId)->uploaded_file_description;

        $teacher = $this->modelCoursesUser->getTeacherFollowCourse($id);

        $embed = Embed::create($link);

        $lectures = $this->modelCoursesUser->findLectureFollowCourse($id);

        return view('lectures.show', compact(
            'embed',
            'lectures',
            'id',
            'description',
            'teacher',
            'lectureId'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLectureRequest $request, $id)
    {
        $updatedLecture = $this->modelCoursesUser->updateLecture($request->all(), $id);

        return response()->json($updatedLecture);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $this->modelCoursesUser->deleteLecture($request->all());
    }
}
