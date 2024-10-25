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
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('tituloEvento',130);
            $table->string('descricaoEvento',14);
            $table->string(column: 'dataInicioEvento',length: 20);
            $table->string(column: 'horaInicioEvento',length: 20);
            $table->string(column: 'dataFimEvento',length: 20);
            $table->string(column: 'horaFimEvento',length: 20);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
