@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fa-regular fa-plus"></i></a></h1>
@stop

@section('content')
    <p></p>
    <div class="card-header">
        <form action="{{ route('products.search') }}" class="form-inline" method="get">
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
                    <td>Preço</td>
                    <td>Status</td>
                    <td width="150">Ações</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        {{-- <td></td> --}}
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->sku) }}" class="btn btn-dark">Ver</a>
                            <a href="{{ route('products.edit', $product->sku) }}" class="btn btn-info">Edit</a>
                            <form action="{{route('products.delete', $product->id) }}" class="form form-inline" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Del</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@stop