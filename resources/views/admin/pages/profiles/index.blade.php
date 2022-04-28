@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a></h1>
@stop

@section('content')
    <p></p>
    <div class="card-header">
        <form action="{{ route('profiles.search') }}" class="form-inline" method="get">
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
                @foreach ($profiles as $profile)
                    <tr>
                        {{-- <td></td> --}}
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->description }}</td>
                        <td>
                            <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-dark">Ver</a>
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@stop