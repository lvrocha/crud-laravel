@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1>CURSO - EDITAR</h1>
@stop

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="box uper">
    <div class="box-header">
        <h3 class="box-title">Editar Curso</h3>
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
        <form method="post" action="{{ route('cursos.update', $curso->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" name="nome" value="{{ $curso->nome }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@stop
