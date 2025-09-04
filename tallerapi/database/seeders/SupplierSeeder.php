<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::insert([
            [
                'name' => 'Hernan Perez', 
                'phone' => '31174554'
            ],

            [
                'name' => 'Maices Gallina Feliz', 
                'phone' => '31174586'
            ],

            [
                'name' => 'Concentrados el Pollon', 
                'phone' => '3478548'
            ]

        ]);
    }
}
