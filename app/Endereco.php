<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'cep',
        'logradouro',
        'cidade',
        'estado',
        'bairro',
        'numero',
        'complemento',
        'id_aluno'
    ];
}
