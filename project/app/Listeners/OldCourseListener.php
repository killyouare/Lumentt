<?php

namespace App\Listeners;

use App\Events\RegistrationForCourseEvent;
use App\Exceptions\ApiException;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OldCourseListener
{
    public function handle(RegistrationForCourseEvent $event)
    {
        if (Course::where('id', $event->course_id)->first()->end_date < date('Y-m-d')) {
            throw new ApiException(422, 'The course is over');
        }
    }
}
