<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('computador', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_tienda');         // Código de tienda
            $table->string('almacenamiento');        // Almacenamiento (por ejemplo: 512GB SSD)
            $table->string('ram');                   // RAM (por ejemplo: 16GB)
            $table->string('tarjeta_grafica');       // Tarjeta gráfica (por ejemplo: NVIDIA GTX 1660)
            $table->decimal('precio', 10, 2);        // Precio en USD
            $table->text('descripcion')->nullable(); // Descripción del computador
            $table->string('imagen')->nullable();    // Nombre o ruta de la imagen (opcional)
            $table->string('procesador');            // Procesador (por ejemplo: Intel i7)
            $table->timestamps();                    // created_at y updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('computador');
    }
};