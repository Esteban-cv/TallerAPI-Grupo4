<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sena_code' => 'SENA-' . fake()->unique()->numberBetween(001, 999),
            'date_entry' => fake()->dateTimeBetween('-1 month', 'now'),
            'expiration_date' => fake()->dateTimeBetween('+6 months', '+2 years'),
            'quantity' => fake()->numberBetween(10, 200),
            'observations' => fake()->randomElement([
                'Entrada inicial de stock',
                'Reposición de inventario',
                'Nueva adquisición',
                'Entrada por donación',
                'Compra programada'
            ]),
            'article_id' => Article::factory()
        ];
    }
}
