<?php

namespace App\Listeners;

use App\Events\RegistrationForCourseEvent;
use App\Exceptions\ApiException;
use App\Models\CourseUser;
use http\Env\Response;
use Illuminate\Http\Exceptions\HttpResponseException;
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
            throw new ApiException(422, 'Юзер уже на курсе');
        }
    }
}
