@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>ALUNO - EDITAR</h1>
@stop

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="box uper">
    <div class="box-header">
        <h3 class="box-title">Editar Aluno</h3>
    </div>
    <div class="box-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('alunos.update', $aluno->cod_aluno) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome" value="{{ $aluno->nome }}"/>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="situacao"
                                @if ( $aluno->situacao == "on")
                                    checked
                                @endif
                            />
                            <b>Ativo:</b>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_cep">Cep</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="end_cep" value="{{ $aluno->end_cep }}">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="button">Buscar Cep</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="end_logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="end_logradouro" value="{{ $aluno->end_logradouro }}">
                </div>
                <div class="form-group">
                    <label for="end_numero">Número</label>
                    <input type="text" class="form-control" name="end_numero" value="{{ $aluno->end_numero }}">
                </div>
                <div class="form-group">
                    <label for="end_complemento">Complemento</label>
                    <input type="text" class="form-control" name="end_complemento" value="{{ $aluno->end_complemento }}">
                </div>
                <div class="form-group">
                    <label for="end_bairro">Bairro</label>
                    <input type="text" class="form-control" name="end_bairro" value="{{ $aluno->end_bairro }}">
                </div>
                <div class="form-group">
                    <label for="end_cidade">Cidade</label>
                    <input type="text" class="form-control" name="end_cidade" value="{{ $aluno->end_cidade }}">
                </div>
                <div class="form-group">
                    <label for="end_estado">Estado</label>
                    <input type="text" class="form-control" name="end_estado" value="{{ $aluno->end_estado }}">
                </div>
                <div class="form-group">
                    <label for="foto">Foto aluno</label>
                    <input type="file" id="foto" value="{{ $aluno->foto }}">
                    <p class="help-block">Anexe a foto do aluno.</p>
                </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@stop
