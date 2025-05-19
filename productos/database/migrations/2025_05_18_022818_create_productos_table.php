<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * este metodo se ejecuta cuando corro la migracion
     */
    public function up(): void
    {
        // creo la tabla productos con las columnas que necesito
        Schema::create('productos', function (Blueprint $table) {
            $table->id(); // columna id autoincremental
            $table->string('nombre'); // nombre del producto
            $table->text('descripcion')->nullable(); // descripcion opcional
            $table->decimal('precio_unitario', 8, 2); // precio con 2 decimales
            $table->integer('cantidad'); // cantidad en stock
            $table->string('categoria'); // categoria del producto
            $table->timestamps(); // columnas created_at y updated_at
        });
    }

    /**
     * este metodo se ejecuta si quiero revertir la migracion
     */
    public function down(): void
    {
        // elimino la tabla productos si existe
        Schema::dropIfExists('productos');
    }
};
