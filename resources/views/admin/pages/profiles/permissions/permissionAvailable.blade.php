@extends('adminlte::page')

@section('title', 'Permissões de Perfil {$profile-name}')

@section('content_header')
    <h1>Permissões disponiveis para o perfil {{ $profile->id }}</h1>
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
        <form action="{{ route('profiles.permissions.store', $profile->id) }}" method="POST">
            @csrf
            <thead>
                <tr>
                    {{-- <td>Image</td> --}}
                    <td width="50px">#</td>
                    <td>Nome</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" />
                        </td>
                        <td>{{ $permission->name }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="500"><button type="submit" class="btn btn-success">Vincular</button></td>
                </tr>
            </tbody>
        </form>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {!! $permissions->appends($filters)->links() !!}
        @else
            {!! $permissions->links() !!}
        @endif
    </div>
@stop