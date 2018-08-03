<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Specialize;
use Validator;
use App\Http\Requests\CreateSpecializeRequest;

class SpecializeController extends Controller
{
    protected $modelSpecialize;
    /**
     * Create a new controller instance.
     *
     * @param Specialize $specialize
     * @return void
     */
    public function __construct(Specialize $specialize)
    {
        $this->modelSpecialize = $specialize;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specializes = Specialize::all();
        
        return view('admin.specializes.index', compact('specializes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSpecializeRequest $request)
    {
        $data = $request->all();
        $result = $this->modelSpecialize->createSpecialize($data);

        if ($result) {
            flash(__('create status') . $result->id)->success();
        } else {
            flash(__('something wrong'))->error();
        }
    
        return redirect('/admin/specializes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specialize = Specialize::findOrFail($id);

        return view('admin.specializes.edit', compact('specialize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSpecializeRequest $request, $id)
    {
        $data = $request->all();
        $result = $this->modelSpecialize->updateSpecialize($data, $id);

        if ($result) {
            flash(__('update status') . $id)->success();
        } else {
            flash(__('something wrong'))->error();
        }

        return redirect('/admin/specializes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->modelSpecialize->deleteSpecialize($id);

        if ($result) {
            flash(__('delete status') . $id)->success();
        } else {
            flash(__('something wrong'))->error();
        }

        return redirect('/admin/specializes');
    }
}
