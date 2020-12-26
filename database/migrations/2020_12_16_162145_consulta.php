<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Consulta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta',function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->boolean('estado');
            $table->timestamp('DataHora')->default(\DB::raw('current_timestamp'));
            $table->timestamp('DataHoraFim')->default(\DB::raw('current_timestamp'));
            $table->String('observacoesmedicas');
            $table->String('observacoesadmin');
            $table->bigInteger('medico_id');
            $table->bigInteger('funcionario_id');
            $table->bigInteger('utente_id');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consulta');
    }
}
