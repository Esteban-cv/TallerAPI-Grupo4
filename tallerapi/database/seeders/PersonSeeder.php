<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Person::insert([
            ['document' => '1001111111',
            'phone' => '3121111111',
            'name' => 'Juan Martínez'
            ],

            ['document' => '1001234567',
            'phone' => '3124567890',
            'name' => 'Carlos Pérez'
            ],

            ['document' => '1002222222',
            'phone' => '3122222222',
            'name' => 'Ana López'
            ],

            ['document' => '1003333333',
            'phone' => '3123333333',
            'name' => 'Luis Rodríguez'
            ],

            ['document' => '1007654321',
            'phone' => '3156781234',
            'name' => 'María Gómez'
            ]
        ]);
    }
}
