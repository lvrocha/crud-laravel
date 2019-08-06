<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'situacao',
        'foto'
    ];

    public function endereco(){
        return $this->hasOne(Endereco::class);
    }
}
