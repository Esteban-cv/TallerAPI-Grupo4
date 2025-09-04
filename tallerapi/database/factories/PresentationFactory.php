<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentation>
 */
class PresentationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => $this->faker->randomElement([
                'Botella de 500ml',
                'Saco de 50kg',
                'Caja de 20 unidades',
                'Frasco de 100ml',
                'Bolsa de 10kg'
            ])
        ];
    }
}
