<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Exercise;
use App\Models\Session;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SessionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Session::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => rand(1,100),
            'identifier' => $this->faker->name,
            'score' => 5,
            'user_id' => User::factory()->make()->id,
            'course_id' => Course::factory()->make()->id,
            'exercise_id' => Exercise::factory()->make()->id,
        ];
    }
}
