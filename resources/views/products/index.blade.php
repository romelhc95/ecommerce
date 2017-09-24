@extends('layouts.app')

@section('content')
    <div class="big-padding text-center blue-grey white-text">
        <h1>Productos</h1>
    </div>
    @include('flash::message')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Id</td>
                    <td>Titulo</td>
                    <td>Description</td>
                    <td>Precio</td>
                    <td>Opciones</td>
                </tr>
            </thead>
            @foreach($products as $product)
            <tbody>
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>S/. {{ $product->pricing }}</td>
                    <td>
                        <a href="{{ url('products/'.$product->id.'/edit') }}">Editar</a>
                        @include('products.delete', ['product', $product])
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
    <div class="floating">
        <a href="{{ url('/products/create') }}" class="btn btn-primary btn-fab">
            <i class="material-icons">add</i>
        </a>
    </div>
@endsection
