@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Detalhes do Perfil #{{ $profile->id }}</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <p><b>Nome:</b> {{ $profile->name }}</b>
        <p><b>Descrição:</b> {{ $profile->description }}</b>
    </div>
    <div class="card-footer">
        <form action="{{route('profiles.destroy', $profile->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Deletar Prefil #{{ $profile->id }}</button>
        </form>
    </div>
</div>
@stop
