<?php

namespace App\Http\Controllers;

use App\Events\UpdatePercentsEvent;
use App\Models\LessonUser;

class LessonUserController extends Controller
{

    public function update($id)
    {
        LessonUser::where([
            'lesson_id' => $id,
            'user_id' => auth()->user()->id
        ])->update(['is_passed' => 1]);

        return response()->json(['data' => [
            'msg' => 'Lesson completed'
        ]]);
    }
}
