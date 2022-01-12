<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TextsizeAtivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ativos', function (Blueprint $table) {
            //
            $table->longText('ativo');
            $table->longText('descrio_ativo');
            $table->longText('dados_pessoais_coletados');
            $table->longText('finalidade');
            $table->longText('responsvel_interno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ativos', function (Blueprint $table) {
            //
        });
    }
}
