<?php

namespace App\Http\Controllers;

use App\Events\RegistrationForCourseEvent;
use App\Models\CourseUser;
use Illuminate\Http\Request;

class CourseUserController extends Controller
{

    public function create(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|integer|exists:courses,id'
        ]);

        event(new RegistrationForCourseEvent($request->course_id));

        # Здесь используется обсервер наблюдающий за криейтом, который записывает юзера на все уроки курса
        CourseUser::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course_id,
        ]);

        return response()->json([
            'data' => [
                'code' => 201,
                'message' => 'Created',
            ]
        ], 201);
    }
}
