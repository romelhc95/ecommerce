@extends('layouts.app')

@section('content')
    <div class="big-padding text-center blue-grey white-text">
        <h1>PRODUCTOS</h1>
    </div>
    @include('flash::message')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>TITULO</b></td>
                    <td><b>DESCRIPCIÓN</b></td>
                    <td style="width: 100px;"><b>PRECIO</b></td>
                    <td><b>OPCIONES</b></td>
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
