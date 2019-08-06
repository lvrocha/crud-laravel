<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $primaryKey = 'cod_aluno';
    protected $fillable = [
        'nome',
        'situacao',
        'end_cep',
        'end_logradouro',
        'end_cidade',
        'end_estado',
        'end_bairro',
        'end_numero',
        'end_complemento',
        'foto'
    ];
}
