<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialize;

class SearchController extends Controller
{
    public function fetchSpecialize(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                $data = Specialize::where('name', 'like', '%' . $query . '%')
                    ->orWhere('teaching_grade', 'like', '%' . $query . '%')
                    ->orderBy('id', 'asc')
                    ->get();
            } else {
                $data = Specialize::orderBy('id', 'asc')
                    ->get();
            }
            
            if ($data->count() > 0) {
                return response()->json($data);
            }
        }
    }
}
