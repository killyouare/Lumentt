<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        return Course::all();
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'tite' => 'required|string',
            'student_capacity' => 'required|numberic',
            'start_date' => 'required|date|after_or_equal:now',
            'end_date' => 'required|date|after:start_date',
            'has_certificate' => 'required|boolean'
        ]);
        return response()->json([
            'data' => [
                'msg' => 'Course created'
            ]
        ]);
    }
}
