@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop

@section('content')
    <p></p>
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
                    {{-- <td>Image</td> --}}
                    <td>Nome</td>
                    <td>Descrição</td>
                    <td width="150">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        {{-- <td></td> --}}
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->description }}</td>
                        <td>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-dark" title="Informações"><i class="fas fa-magnifying-glass"></i>E</a>
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info" title="Editar"><i class="fas fa-pen"></i></a>
                            <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-info" title="Permissões"><i class="fas fa-lock"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        @if (isset($filters))
            {!! $profiles->appends($filters)->links() !!}
        @else
            {!! $profiles->links() !!}
        @endif
    </div>
@stop