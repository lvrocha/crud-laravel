<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTurmaCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turma_cursos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_matricula');
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')
                    ->references('id')
                    ->on('alunos')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')
                    ->references('id')
                    ->on('turmas')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')
                    ->references('id')
                    ->on('cursos')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('aluno_turma_cursos');
    }
}
