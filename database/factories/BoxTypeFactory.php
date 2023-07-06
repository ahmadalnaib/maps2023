<?php

namespace Database\Factories;

use App\Models\BoxType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoxType>
 */
class BoxTypeFactory extends Factory
{
    protected $model = BoxType::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'tenant_id' => $this->faker->numberBetween(1, 10),
            'name' => $this->faker->word,
            'depth' => $this->faker->randomFloat(2, 1, 10),
            'width' => $this->faker->randomFloat(2, 1, 10),
            'height' => $this->faker->randomFloat(2, 1, 10),
            'description' => $this->faker->paragraph,
            'ebike_option' => $this->faker->boolean,
            'first_floor_option' => $this->faker->boolean,
            'big' => $this->faker->boolean,
        ];
    }
}
