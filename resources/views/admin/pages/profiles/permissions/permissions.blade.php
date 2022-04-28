@extends('adminlte::page')

@section('title', 'Permissões de Perfil {$profile-name}')

@section('content_header')
    <h1>Permissões do Perfil {{ $profile->id }}</h1>
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success" title="Vincular Permissões"><i class="fas fa-plus"></i></a>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card-header">
        <form action="{{ route('profiles.search') }}" class="form form-inline" method="GET">
            @csrf
            <input type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? '' }}" placeholder="Filtro">
            <button type="submit" class="btn btn-info">Buscar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condenced">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td width="150">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-dark"><i class="fas fa-info"></i></a>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info"><i class="fas fa-highlighter"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@stop