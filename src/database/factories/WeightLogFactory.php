<?php

namespace Database\Factories;

use App\Models\WeightLog;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '+2 month'),
            'weight' => $this->faker->randomFloat(1, 45, 120),
            'calories' => $this->faker->randomNumber,
            'exercise_time' => $this->faker->time('H:i'),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
