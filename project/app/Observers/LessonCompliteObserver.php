<?php

namespace App\Observers;

use App\Models\CourseUser;
use App\Models\Lesson;
use App\Models\LessonUser;

trait LessonCompliteObserver
{
    protected static function boot()
    {
        parent::boot();

        static::updated(function ($lessonuser) {
            $user_id = $lessonuser->user_id;

            $course_id = Lesson::where('id', $lessonuser->lesson_id)->first()->course_id;

            $lessons = Lesson::where('course_id', $course_id)->get('id');

            $complitedLessonsCount = LessonUser::whereIn('lesson_id', $lessons)->where([
                'user_id' => $user_id,
                'is_passed' => 1
            ])->count();

            CourseUser::where([
                'user_id' => $user_id,
                'course_id' => $course_id
            ])->first()->update(['percentage_passing' => $complitedLessonsCount / $lessons->count() * 100]);
        });
    }
}
