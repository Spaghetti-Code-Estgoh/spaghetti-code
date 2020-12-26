<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Funcionario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionario',function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->String('nome');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('contacto');
            $table->integer('nif')->unique();
            $table->String('genero');
            $table->String('morada');
            $table->String('fotoperfil');
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
        Schema::dropIfExists('funcionario');
    }
}
