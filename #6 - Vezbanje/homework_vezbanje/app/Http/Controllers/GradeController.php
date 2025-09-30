<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    function store(Request $request) {

        $request->validate([
            "subject"   =>  "required|string",
            "grade"     =>  "required|integer|min:1|max:5",
            "profesor"  =>  "required|string"
        ]);
        Grade::create($request->all());
        return redirect('/');        
    }
}
