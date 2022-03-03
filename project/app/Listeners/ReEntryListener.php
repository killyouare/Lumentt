<?php

namespace App\Listeners;

use App\Events\RegistrationForCourseEvent;
use App\Models\CourseUser;
use http\Env\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ReEntryListener
{
    public function handle(RegistrationForCourseEvent $event)
    {
        $course = $event->course_id;
        $user_id = auth()->user()->id;
        if (CourseUser::where([
            'course_id' => $course,
            'user_id' => $user_id,
        ])->first()) {
            return response()->json([
                'error' => 'Юзер уже существует'
            ]);
        }

    }
}
