<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return CourseResource::collection(Course::all());
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'student_capacity' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:now',
            'end_date' => 'required|date|after:start_date',
            'has_certificate' => 'required|boolean'
        ]);

        Course::create($request->all());

        return response()->json([
            'data' => [
                'msg' => 'Course created'
            ]
        ]);
    }
}
