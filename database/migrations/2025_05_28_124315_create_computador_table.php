<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Define una nueva clase 
return new class extends Migration {

    public function up(): void {
        // Crea la tabla 'computador' en la base de datos
        Schema::create('computador', function (Blueprint $table) {
            $table->id(); 
            $table->string('marca');
            $table->string('modelo'); 
            $table->double('precio', 8, 2);
            $table->date('fecha_compra');
            $table->boolean('en_uso')->default(true); 
            $table->timestamps(); 
        });
    }

    public function down(): void {
        // Elimina la tabla 'computador' si existe
        Schema::dropIfExists('computador');
    }
};


