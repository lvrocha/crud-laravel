@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>ALUNOS - NOVO</h1>
@stop

@section('content')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">
            Adicionar Aluno
        </h3>
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
        <form method="post" action="{{ route('alunos.store') }}" enctype="multipart/form-data" >
            <div class="form-group">
                @csrf
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="nome"/>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="situacao"/>
                            <b>Ativo:</b>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cep">Cep</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="cep">
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="button">Buscar Cep</button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" name="logradouro">
                </div>
                <div class="form-group">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" name="numero">
                </div>
                <div class="form-group">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" name="complemento">
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" name="bairro">
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" name="cidade">
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" class="form-control" name="estado">
                </div>
                <div class="form-group">
                    <label for="foto">Foto aluno</label>
                    <input type="file" id="foto">
                    <p class="help-block">Anexe a foto do aluno.</p>
                </div>
                <div class="form-group">
                    <label for="curso">Curso</label>
                    <input type="text" class="form-control" name="curso">
                </div>
                <div class="form-group">
                    <label for="turma">Turma</label>
                    <input type="text" class="form-control" name="turma">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Adicionar</button>
        </form>
    </div>
</div>
@stop
