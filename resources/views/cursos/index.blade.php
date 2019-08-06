@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>CURSOS - INDEX</h1>
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
                <td>Codigo Curso</td>
                <td>Nome</td>
                <td colspan="2">Ações</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($cursos as $curso)
            <tr>
                <td>{{$curso->id}}</td>
                <td>{{$curso->nome}}</td>
                <td><a href="{{ route('cursos.edit', $curso->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                        <form action="{{ route('cursos.destroy', $curso->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary">NOVO</a>
</div>
@stop
