<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;


class CourseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $limit = $this->command->ask('Please enter the limit for creating');

        Course::factory($limit)->create();
    }
}
