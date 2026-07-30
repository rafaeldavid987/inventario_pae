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

        $table->string('codigo',20)->unique();
        $table->string('dane',20)->nullable();

        $table->string('nombre',150);

        $table->string('municipio',100);

        $table->string('direccion',200)->nullable();

        $table->string('responsable',100)->nullable();

        $table->string('telefono',20)->nullable();

        $table->unsignedInteger('numero_estudiantes')->default(0);

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
