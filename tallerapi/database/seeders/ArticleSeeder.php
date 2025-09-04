<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $article = new Article();
        $article->name = "Antibiótico Bovino";
        $article->quantity = "100";
        $article->photo = null;
        $article->technical_sheet = null;
        //FKs
        $presentation = Presentation::where('id', 1)->first();
        $article->presentation_id = $presentation->id;

        $category = Category::where('id', 1)->first();
        $article->category_id = $category->id;

        $supplier = Supplier::where('id', 1)->first();
        $article->supplier_id = $supplier->id;

        $unit = Unit::where('id', 1)->first();
        $article->unit_id = $unit->id;

        $article->save();
    }
}