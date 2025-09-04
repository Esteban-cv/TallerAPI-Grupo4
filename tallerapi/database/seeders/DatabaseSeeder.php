<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Presentation;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PersonSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(PresentationSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(EntrySeeder::class);
        $this->call(IssueSeeder::class);
    }
}
