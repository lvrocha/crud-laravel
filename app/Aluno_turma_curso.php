<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno_turma_curso extends Model
{
    protected $fillable = [
        'id_aluno',
        'data_matricula',
        'id_turma',
        'id_curso'
    ];
}
