@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>ALUNOS - INDEX</h1>
@stop

@section('content')
<style>
    .uper{
        margin-top: 40px;
    }
</style>
<div class="uper">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Matricula</td>
                <td>Nome</td>
                <td>Situacao</td>
                <td>Cep</td>
                <td>Logradouro</td>
                <td>Cidade</td>
                <td>Estado</td>
                <td>Bairro</td>
                <td>Numero</td>
                <td>Complemento</td>
                <td>Foto</td>
                <td colspan="2">Ações</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($alunos as $aluno)
            <tr>
                <td>{{$aluno->cod_aluno}}</td>
                <td>{{$aluno->nome}}</td>
                <td>{{$aluno->situacao}}</td>
                <td>{{$aluno->end_cep}}</td>
                <td>{{$aluno->end_logradouro}}</td>
                <td>{{$aluno->end_cidade}}</td>
                <td>{{$aluno->end_estado}}</td>
                <td>{{$aluno->end_bairro}}</td>
                <td>{{$aluno->end_numero}}</td>
                <td>{{$aluno->end_complemento}}</td>
                <td>{{$aluno->foto}}</td>
                <td><a href="{{ route('alunos.edit', $aluno->cod_aluno)}}" class="btn btn-primary">Edit</a></td>
                <td>
                        <form action="{{ route('alunos.destroy', $aluno->cod_aluno)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('alunos.create') }}" class="btn btn-primary">NOVO</a>
</div>
@stop