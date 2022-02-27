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
        Course::factory()->count(30)->create();
    }
}
