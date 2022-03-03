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
        event(new UpdatePercentsEvent($id));

        return response()->json(['data' => [
            'msg' => 'User updated'
        ]], 201);
    }
}
