<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $primaryKey = 'cod_turma';
    protected $fillable = [
        'nome'
    ];
}
