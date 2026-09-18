<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // La columna marca ya existe en productos.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No eliminar marca porque ya existía antes de esta migración.
    }
};