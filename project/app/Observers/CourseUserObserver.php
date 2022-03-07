<?php

namespace App\Observers;

use App\Models\Lesson;
use App\Models\LessonUser;


trait CourseUserObserver
{
    protected static function boot()
    {
        parent::boot();

        static::created(function ($usercourse) {

            $lessons = Lesson::where('course_id', $usercourse->course_id)->get();

            foreach ($lessons as $lesson) {
                LessonUser::create([
                    'user_id' => $usercourse->user_id,
                    'lesson_id' => $lesson->id,
                    'is_passed' => 0
                ]);
            }
        });
    }
}
