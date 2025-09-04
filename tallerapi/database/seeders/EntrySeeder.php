<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $entry = new Entry();
        $entry->sena_code = "SENA-001";
        $entry->date_entry = "2025-03-01";
        $entry->expiration_date = "2026-03-01";
        $entry->quantity = "50";
        $entry->observations = "Entrada inicial de antibiótico";
        //FKs
        $article = Article::where('id', 1)->first();
        $entry->article_id = $article->id;

        $entry->save();
    }
}
