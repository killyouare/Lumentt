<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function index(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required'
        ]);

        $lessons = Lesson::where(['course_id' => $request->course_id])->get();
        return response()->json([
            'data' => [
                'lessons' => $lessons
            ]
        ], 200);
    }
}
