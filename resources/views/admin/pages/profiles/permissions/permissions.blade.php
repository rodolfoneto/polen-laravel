@extends('adminlte::page')

@section('title', 'Permissões de Perfil {$profile-name}')

@section('content_header')
    <h1>Permissões do Perfil {{ $profile->id }}</h1>
    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-success" title="Vincular Permissões"><i class="fas fa-plus"></i></a>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="card-header">
        <form action="{{ route('profiles.permissions', $profile->id) }}" class="form form-inline" method="GET">
            <input type="text" name="filter" class="form-control" value="{{ $filters ?? '' }}" placeholder="Filtro">
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
                            <form action="{{ route('profiles.permissions.destroy', [$profile->id, $permission->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark" title="Desatrelar do perfil"><i class="fas fa-unlock"></i></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop