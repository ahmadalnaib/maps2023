<?php

namespace Database\Factories;

use App\Models\Place;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{

    protected $model = Place::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'id' => Str::uuid(),
            'tenant_id' => $this->faker->randomNumber(),
            'name' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'image' => 'public/images/default.png',
            'category_id' => $this->faker->randomNumber(),
            'overview' => $this->faker->paragraph,
            'address' => $this->faker->address,
            'user_id' => $this->faker->randomNumber(),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'view_count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
