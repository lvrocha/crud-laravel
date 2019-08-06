@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>TURMAS - INDEX</h1>
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
                <td>Codigo turma</td>
                <td>Nome</td>
                <td colspan="2">Ações</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($turmas as $turma)
            <tr>
                <td>{{$turma->cod_turma}}</td>
                <td>{{$turma->nome}}</td>
                <td><a href="{{ route('turmas.edit', $turma->cod_turma)}}" class="btn btn-primary">Edit</a></td>
                <td>
                        <form action="{{ route('turmas.destroy', $turma->cod_turma)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('turmas.create') }}" class="btn btn-primary">NOVO</a>
</div>
@stop
