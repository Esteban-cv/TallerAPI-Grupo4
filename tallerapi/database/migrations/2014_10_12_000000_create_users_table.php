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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('nombre usuarios');
            $table->string('email')->unique()->comment('correo usuarios');
            $table->string('password')->comment('contraseña usuarios');
            $table->foreignId('role_id')->constrained('role')->onDelete('cascade')->onUpdate('cascade')->comment('FK tabla role');
            $table->enum('status', ['ACTIVO', 'INACTIVO '])->comment('estado del usuario');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
