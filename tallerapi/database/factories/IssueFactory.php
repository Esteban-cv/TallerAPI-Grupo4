<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Person;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
    public function definition(): array
    {
        return [
            'date_issue' => fake()->dateTimeBetween('-1 month', 'now'),
            'quantity' => fake()->numberBetween(1, 50),
            'observations' => fake()->randomElement([
                'Salida para uso en tratamiento',
                'Salida para alimentación',
                'Salida para siembra',
                'Salida para mantenimiento',
                'Entrega a personal'
            ]),
            'article_id' => Article::factory(),
            'document' => Person::factory(),
            'unit_id' => Unit::factory()
        ];
    }
}
