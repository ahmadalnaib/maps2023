<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{

    protected $model = Plan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'policy_id' => $this->faker->numberBetween(1, 10), // Replace the range as per your requirements
            'name' => $this->faker->word,
            'number_of_days' => $this->faker->numberBetween(1, 30), // Replace the range as per your requirements
            'price' => $this->faker->randomFloat(2, 10, 100), // Replace the range as per your requirements
            'tenant_id' => $this->faker->numberBetween(1, 100),
        ];
    }
}
