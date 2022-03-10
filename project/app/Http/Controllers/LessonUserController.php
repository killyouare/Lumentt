<?php

namespace App\Http\Controllers;

use App\Events\UpdatePercentsEvent;
use App\Models\LessonUser;

class LessonUserController extends Controller
{

    public function update($id)
    {
        $lessonUser = LessonUser::where([
            'lesson_id' => $id,
            'user_id' => auth()->user()->id
        ])->first();

        if (!$lessonUser) {
            return response()->json(['errror' => ['message' => 'Данного урока не существует']], 409);
        }
        # Здесь используется обсервер наблюдающий за апдейтом, который пересчитывает проценты
        $lessonUser->update(['is_passed' => 1]);

        return response()->json(['data' => [
            'code' => 200,
            'message' => 'Lesson updated',
        ]]);
    }
}
