@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Editar um produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product->sku) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.products._partials.form')
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </form>
        </div>
    </div>
@stop