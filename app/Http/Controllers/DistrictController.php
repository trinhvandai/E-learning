<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function update()
    {
        $districts = \App\Models\Province::find($_POST['provinceId'])->districts;

        return \Response::json($districts);
    }
}
