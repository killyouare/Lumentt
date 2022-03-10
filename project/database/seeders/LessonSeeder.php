<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Lesson;
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
        $limit = $this->command->ask('Please enter the limit for creating');

        Lesson::factory($limit)->create();
    }
}
