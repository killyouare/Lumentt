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
        Course::factory(50)->create();
        Course::factory(3)->create([
            'end_date' => '2050-03-05'
        ]);
    }
}
