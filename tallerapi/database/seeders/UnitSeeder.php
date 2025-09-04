<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::insert([
            [
                'name' => 'Kilogramos'
            ],

            [
                'name' => 'Litros'
            ],

            [
                'name' => 'Unidades'
            ],

            [
                'name' => 'Paquetes'
            ],

            [
                'name' => 'Metros cúbicos'
            ]
        ]);
    }
}
