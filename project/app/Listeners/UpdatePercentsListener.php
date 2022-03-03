<?php

namespace App\Listeners;

use App\Events\UpdatePercentsEvent;
use App\Models\Course;
use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\LessonUser;


class UpdatePercentsListener
{
    public function handle(UpdatePercentsEvent $event)
    {

        $user_id = auth()->user()->id;

        $course_id = Lesson::where('id', $event->lesson_id)->first()->course_id;

        $lessons = Lesson::where('course_id', $course_id)->get();
        $count = 0;
        foreach ($lessons as $lesson) {
            if (LessonUser::where('lesson_id', $lesson->id)->first()->is_passed == 1) {
                $count++;
            };
        }

        CourseUser::where([
            'user_id' => $user_id,
            'course_id' => $course_id
        ])->first()->update(['percentage_passing' => $count / $lessons->count() * 100]);
    }
}
