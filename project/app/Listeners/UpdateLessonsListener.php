<?php

namespace App\Listeners;

use App\Events\RegistrationForCourseEvent;
use App\Events\UpdateLessonsEvent;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\LessonUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateLessonsListener
{
    public function handle(UpdateLessonsEvent $event)
    {
        $course_id = $event->course_id;
        $user_id = auth()->user()->id;

        $lessons = Lesson::where('course_id', $course_id)->get();

        foreach ($lessons as $lesson){
            LessonUser::create([
                'user_id' => $user_id,
                'lesson_id' => $lesson->id,
                'is_passed' => 0
            ]);
        }
    }
}
