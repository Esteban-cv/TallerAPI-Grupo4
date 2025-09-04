<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issue', function (Blueprint $table) {
            $table->id();
            $table->string('sena_code')->nullable()->comment('codigo sena');
            $table->date('date_issue')->comment('fecha salida');
            $table->integer('quantity')->comment('cantidad salida');
            $table->text('observations')->nullable()->comment('observaciones salida');
            $table->foreignId('article_id')->constrained('article')->onDelete('cascade')->onUpdate('cascade')->comment('FK con articulo');
            $table->foreignId('person_id')->constrained('person')->onDelete('cascade')->onUpdate('cascade')->comment('FK con persona');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issue');
    }
};
