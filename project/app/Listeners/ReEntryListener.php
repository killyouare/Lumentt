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
        if (CourseUser::where([
            'course_id' => $event->course_id,
            'user_id' => auth()->user()->id,
        ])->first()) {
            throw new ApiException(422, 'You are already enrolled in the course');
        }
    }
}
