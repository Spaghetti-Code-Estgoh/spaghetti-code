<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UtentesNAprovados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utentes_n_aprovados',function (Blueprint $table){
            $table->id()->autoIncrement();
            $table->String('nome');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('contacto');
            $table->integer('nif')->unique();
            $table->integer('nss')->unique();
            $table->String('genero');
            $table->String('morada');
            $table->String('imagePath');
            $table->Date('dataNascimento');
            $table->String('tokenConfirm')->unique();
            $table->integer('confirmed')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('utentes_n_aprovados');
    }
}
