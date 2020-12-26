<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampUserNAprovados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('utentes_n_aprovados', function (Blueprint $table) {
            $table->timestamp('dataHora')->default(\DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('utentes_n_aprovados', function (Blueprint $table) {
            $table->dropColumn(['dataHora']);
        });
    }
}
