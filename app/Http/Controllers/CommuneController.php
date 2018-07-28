<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommuneController extends Controller
{
    public function update()
    {
        $communes = \App\Models\District::find($_POST['districtId'])->communes;

        return \Response::json($communes);
    }
}
