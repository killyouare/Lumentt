<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;


class LessonSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Lesson::factory()->count(30)->state(new Sequence(
            fn ($sequence) => ['course_id' => Course::all()->random()]
        ))->create();
    }
}
