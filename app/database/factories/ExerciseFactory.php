<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercise::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => rand(1,100),
            'name' => $this->faker->name,
            'score' => 10,
            'category_id' => Category::factory()->make()->id,
        ];
    }
}
