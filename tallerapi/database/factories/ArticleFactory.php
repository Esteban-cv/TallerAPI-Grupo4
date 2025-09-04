<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->words(3, true),
            'quantity' => fake()->unique()->numberBetween([100, 9999]),
            'photo' => $this->faker->imageUrl(640, 480, 'agriculture'),
            'technical_sheet' => $this->faker->url(),
            'presentation_id' => $this->faker->numberBetween(1, 5),
            'category_id' => $this->faker->numberBetween(1, 5),
            'supplier_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
