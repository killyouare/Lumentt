<?php

namespace App\Listeners;

use App\Events\RegistrationForCourseEvent;
use App\Models\Course;
use App\Models\CourseUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class OverCountListener
{
    public function handle(RegistrationForCourseEvent $event)
    {
        $course = Course::where('id', $event->course_id)->first();
        if (CourseUser::where('course_id', $course->id)->count() >= $course->student_capacity){
            return response()->json([
                'error' => 'Курс переполнен',
            ], 422);
        }
    }
}
