<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Hernan Perez',
                'Maices Gallina Feliz',
                'Concentrados el Pollon',
                'Agropecuaria El Campo',
                'Distribuidora Rural'
            ]),
            'phone' => fake()->numerify('31########')
        ];
    }
}
