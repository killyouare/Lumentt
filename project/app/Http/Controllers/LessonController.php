<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|numberic'
        ]);

        $lessons = Lesson::where(['course_id', $request->course_id]);

        return response()->json([
            'data' => [
                'users' => $lessons
            ]
        ], 200);
    }
}
