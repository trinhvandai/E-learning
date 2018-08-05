<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OnlineClassroom;
use App\Http\Requests\FormOnlineClassroomRequest;

class OnlineClassroomController extends Controller
{
    protected $modelOnlineClassroom;
    /**
     * Create a new controller instance.
     *
     * @param OnlineClassroom $onlineClassroom
     * @return void
     */
    public function __construct(OnlineClassroom $onlineClassroom)
    {
        $this->modelOnlineClassroom = $onlineClassroom;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $onlineClassrooms = OnlineClassroom::all();

        return view('admin.online_classrooms.index', compact('onlineClassrooms'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onlineClassroom = OnlineClassroom::findOrFail($id);

        return view('admin.online_classrooms.edit', compact('onlineClassroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormOnlineClassroomRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->modelOnlineClassroom->updateOnlineClassroom($data, $id);

        if ($result) {
            flash(__('update status') . $id)->success();
        } else {
            flash(__('something wrong'))->error();
        }

        return redirect(route('admins.online_classrooms.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->modelOnlineClassroom->deleteOnlineClassroom($id);

        if ($result) {
            flash(__('delete status') . $id)->success();
        } else {
            flash(__('something wrong'))->error();
        }

        return redirect(route('admins.online_classrooms.index'));
    }
}
