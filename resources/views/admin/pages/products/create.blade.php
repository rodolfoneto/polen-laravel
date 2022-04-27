@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Criação de um produto</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.store') }}" class="form" method="POST">
                @csrf
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
@stop