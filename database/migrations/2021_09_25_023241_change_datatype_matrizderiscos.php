<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDatatypeMatrizderiscos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matriz_de_riscos', function (Blueprint $table) {
            $table->text('planos_de_ao_para_implementao_de_controles')->change();
            $table->text('fundamentao')->change();
            $table->longText('nome_do_ativo_ou_processo');
            $table->longText('descrio');
            $table->longText('dados_pessoais_coletados');
            $table->longText('finalidade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('matriz_de_riscos', function (Blueprint $table) {
            //
        });
    }
}
