<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        /*
        |--------------------------------------------------------------------------
        | CLIENTES -> CAMPINGS
        |--------------------------------------------------------------------------
        */

        Schema::table('clientes', function (Blueprint $table) {

            $table->unsignedBigInteger('id_camping')->change();

            $table->foreign('id_camping')
                ->references('id')
                ->on('campings')
                ->restrictOnDelete();
        });


        /*
        |--------------------------------------------------------------------------
        | PARCELAS -> CAMPINGS
        |--------------------------------------------------------------------------
        */

        Schema::table('parcelas', function (Blueprint $table) {

            $table->unsignedBigInteger('id_camping')->change();

            $table->foreign('id_camping')
                ->references('id')
                ->on('campings')
                ->restrictOnDelete();
        });


        /*
        |--------------------------------------------------------------------------
        | TARIFAS -> CAMPINGS
        |--------------------------------------------------------------------------
        */

        Schema::table('tarifas', function (Blueprint $table) {

            $table->unsignedBigInteger('id_camping')->change();

            $table->foreign('id_camping')
                ->references('id')
                ->on('campings')
                ->restrictOnDelete();
        });


        /*
        |--------------------------------------------------------------------------
        | USUARIOS -> CAMPINGS / IDIOMAS
        |--------------------------------------------------------------------------
        */

        Schema::table('usuarios', function (Blueprint $table) {

            $table->unsignedBigInteger('id_camping')->change();
            $table->unsignedBigInteger('id_idioma')->change();

            $table->foreign('id_camping')
                ->references('id')
                ->on('campings')
                ->restrictOnDelete();

            $table->foreign('id_idioma')
                ->references('id')
                ->on('idiomas')
                ->restrictOnDelete();
        });


        /*
        |--------------------------------------------------------------------------
        | CHECKINS -> CLIENTES / PARCELAS / TARIFAS
        |--------------------------------------------------------------------------
        */

        Schema::table('checkins', function (Blueprint $table) {

            $table->unsignedBigInteger('id_cliente')->change();
            $table->unsignedBigInteger('id_parcela')->change();
            $table->unsignedBigInteger('id_tarifa')->change();

            $table->foreign('id_cliente')
                ->references('id')
                ->on('clientes')
                ->restrictOnDelete();

            $table->foreign('id_parcela')
                ->references('id')
                ->on('parcelas')
                ->restrictOnDelete();

            $table->foreign('id_tarifa')
                ->references('id')
                ->on('tarifas')
                ->restrictOnDelete();
        });
    }


    public function down(): void
    {
        Schema::table('checkins', function (Blueprint $table) {
            $table->dropForeign(['id_cliente']);
            $table->dropForeign(['id_parcela']);
            $table->dropForeign(['id_tarifa']);
        });

        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropForeign(['id_camping']);
            $table->dropForeign(['id_idioma']);
        });

        Schema::table('tarifas', function (Blueprint $table) {
            $table->dropForeign(['id_camping']);
        });

        Schema::table('parcelas', function (Blueprint $table) {
            $table->dropForeign(['id_camping']);
        });

        Schema::table('clientes', function (Blueprint $table) {
            $table->dropForeign(['id_camping']);
        });
    }
};
