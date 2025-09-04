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
        Schema::create('article', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nombre articulo')->unique();
            $table->integer('quantity')->comment('cantidad articulo');
            $table->integer('min_quantity')->default(1)->comment('cantidad minima');
            $table->string('photo',255)->nullable()->comment('foto articulo');
            $table->text('technical_sheet')->nullable()->comment('ficha tecnica articulo');
            $table->foreignId('presentation_id')->nullable()->constrained('presentation')->onDelete('cascade')->onUpdate('cascade')->comment('Fk con presentacion');
            $table->foreignId('category_id')->nullable()->constrained('category')->onDelete('cascade')->onUpdate('cascade')->comment('Fk con categoria');
            $table->foreignId('supplier_id')->nullable()->constrained('supplier')->onDelete('cascade')->onUpdate('cascade')->comment('Fk con proveedor');
              $table->foreignId('unit_id')->nullable()->constrained('unit')->onDelete('cascade')->onUpdate('cascade')->comment('Fk con unidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
