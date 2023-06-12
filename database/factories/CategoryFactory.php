<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    protected $model = Category::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => function () {
                // Assuming you have a User model with an 'id' field
                return \App\Models\User::factory()->create()->id;
            },
            'title' => [
                'en' => $this->faker->word,
                'de' => $this->faker->word,
                // Add more translations as needed
            ],
            'image' => 'public/images/default.png',
            'slug' => $this->faker->unique()->slug,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
