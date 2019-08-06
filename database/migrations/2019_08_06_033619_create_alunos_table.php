<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('cod_aluno');
            $table->string('nome');
            $table->string('situacao')->nullable($value = "off");
            $table->string('end_cep');
            $table->string('end_logradouro');
            $table->string('end_cidade');
            $table->string('end_estado');
            $table->string('end_bairro');
            $table->string('end_numero');
            $table->string('end_complemento')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
