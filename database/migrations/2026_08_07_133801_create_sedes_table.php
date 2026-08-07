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
    Schema::create('sedes', function (Blueprint $table) {

        $table->id();

        $table->string('codigo', 20)->unique();

        $table->string('nombre', 150);

        $table->foreignId('colegio_id')
              ->constrained('colegios')
              ->cascadeOnUpdate()
              ->restrictOnDelete();

        $table->string('direccion', 200);

        $table->string('telefono', 30)->nullable();

        $table->string('responsable', 150)->nullable();

        $table->boolean('estado')->default(true);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes');
    }
};
