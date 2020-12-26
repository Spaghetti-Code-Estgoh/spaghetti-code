<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Utentes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentes',function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->String('nome');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('contacto');
            $table->integer('nif')->unique();
            $table->integer('nss')->unique();
            $table->String('genero');
            $table->String('morada');
            $table->String('fotoperfil');
            $table->Date('dataNascimento');
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
        Schema::dropIfExists('utentes');
    }
}
