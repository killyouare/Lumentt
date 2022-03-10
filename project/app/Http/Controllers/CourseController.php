<?php

namespace App\Http\Controllers;

use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return CourseResource::collection(Course::all()->sortBy('id'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:256',
            'student_capacity' => 'required|integer|gt:0',
            'start_date' => 'required|date_format:Y-m-d|after_or_equal:now',
            'end_date' => 'required|date_format:Y-m-d|after:start_date',
            'has_certificate' => 'required|boolean'
        ]);

        Course::create($request->all());

        return response()->json([
            'data' => [
                'code' => 201,
                'message' => 'Course created',
            ]
        ], 201);
    }
}
