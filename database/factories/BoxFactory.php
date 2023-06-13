<?php

namespace Database\Factories;

use App\Models\Box;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
class BoxFactory extends Factory
{
    protected $model = Box::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tenant_id' => $this->faker->numberBetween(1, 100),
            'number' => $this->faker->unique()->numberBetween(1, 100),
            'box_type_id' => $this->faker->numberBetween(1, 10),
            'plan_id' => $this->faker->unique()->text(255),
            'system_id' => $this->faker->numberBetween(1, 100),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
