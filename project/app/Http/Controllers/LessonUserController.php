<?php

namespace App\Http\Controllers;

use App\Models\LessonUser;
use App\Rules\ExistingLesson;
use Illuminate\Http\Request;

class LessonUserController extends Controller
{

    public function update(Request $request)
    {
        $request->merge(['id' => $request->route('id')]);
        $this->validate($request, [
            'id' => [new ExistingLesson],
        ]);
        LessonUser::where([
            'lesson_id' => $request->id,
            'user_id' => auth()->user()->id
        ])->first()->update(['is_passed' => 1]);

        return response()->json(['data' => [
            'code' => 200,
            'message' => 'Lesson updated',
        ]]);
    }
}
