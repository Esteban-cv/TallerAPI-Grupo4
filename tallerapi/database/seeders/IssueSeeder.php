<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Person;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IssueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $issue = new Issue();
        $issue->sena_code = "SENA-001";
        $issue->date_issue = "2025-03-02";
        $issue->quantity = "10";
        $issue->observations = "Salida para uso en tratamiento";
        //Fks
        $article = Article::where('id', 1)->first();
        $issue->article_id = $article->id;

        $person = Person::where('id', 1)->first();
        $issue->person_id=$person->id;

        $issue->save();
    }
}
