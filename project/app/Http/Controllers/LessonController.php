<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Http\Resources\LessonResource;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    public function show(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required|integer|exists:courses,id'
        ]);

        $lessons = Lesson::where(['course_id' => $request->course_id])->get();

        return LessonResource::collection($lessons);
    }
}
