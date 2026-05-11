<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->enum('tipo', ['por_kilovatio', 'por_amperio'])->default('por_kilovatio');
            $table->decimal('precio_dia')->index()->nullable();
            $table->decimal('precio_kilovatio', 4)->nullable();
            $table->decimal('kwh_gratuitos')->nullable();
            $table->integer('limite_watts');
            $table->boolean('limite_amperios');
            $table->integer('id_camping')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifas');
    }
};
