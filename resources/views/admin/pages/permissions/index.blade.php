@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões <a href="http://polen-laravel.test/admin/permissions/create" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop

@section('content')
    <div class="card-header">
        <form action="{{ route('permissions.search') }}" class="form form-inline" method="GET">
            @csrf
            <input type="text" name="filter" class="form-control" value="{{ $filters['filter'] ?? '' }}" placeholder="Filtro">
            <button type="submit" class="btn btn-info">Buscar</button>
        </form>
    </div>
    <div class="card-body">
        <table class="table table-condenced">
            <thead>
                <tr>
                    {{-- <td>Image</td> --}}
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td width="150">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        {{-- <td></td> --}}
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                            <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-dark"><i class="fas fa-info"></i></a>
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-info"><i class="fas fa-highlighter"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
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