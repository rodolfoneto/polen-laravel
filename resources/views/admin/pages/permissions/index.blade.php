@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões <a href="http://polen-laravel.test/admin/permissions/create" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop

@section('content')
    <p></p>
    <div class="card-header">
        <form action="{{ route('permissions.search') }}" class="form-inline" method="get">
            <input type="text" name="term" class="input-control" value="{{ $term ?? '' }}">
            <x-adminlte-button type="submit" label="Dark" theme="dark" icon="fas fa-adjust"/>
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
@stop