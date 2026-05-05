<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campings', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 40);
            $table->string('direccion', 50);
            $table->string('persona_contacto', 20);
            $table->string('telefono_contacto', 20);
            $table->string('correo_contacto', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campings');
    }
};
