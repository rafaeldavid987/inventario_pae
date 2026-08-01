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
    Schema::create('colegios', function (Blueprint $table) {
        $table->id();

        $table->string('nombre', 200);
        $table->string('nit', 30)->nullable();
        $table->string('dane', 20)->unique();

        $table->string('direccion', 255);

        $table->string('telefono', 30)->nullable();
        $table->string('email', 150)->nullable();

        $table->string('rector', 150)->nullable();

        $table->foreignId('municipio_id')
              ->constrained('municipios')
              ->cascadeOnUpdate()
              ->restrictOnDelete();

        $table->boolean('estado')->default(true);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colegios');
    }
};
