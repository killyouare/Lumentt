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
            'course_id' => 'required|numeric'
        ]);

        event(new RegistrationForCourseEvent($request->course_id));

        CourseUser::create([
            'user_id'=>auth()->user()->id,
            'course_id' => $request->course_id,
            'percentage_passing' => 0
        ]);

        return response()->json([
            'data'=> [
                'msg'=>'Created'
            ]
        ], 201);
    }
}
