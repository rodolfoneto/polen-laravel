@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Detalhes da Permissão #{{ $permission->id }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><b>Nome:</b> {{ $permission->name }}</b>
        <p><b>Descrição:</b> {{ $permission->description }}</b>
    </div>
    <div class="card-footer">
        <form action="{{route('permissions.delete', $permission->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar Permissão</button>
        </form>
    </div>
</div>
@stop
