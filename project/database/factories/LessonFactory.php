<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Course;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'theme' => $this->faker->word(),
            'course_id' => Course::all()->random(),
        ];
    }
}
