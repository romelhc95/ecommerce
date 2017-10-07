@extends('layouts.app')
@section('content')
    <div class="big-padding text-center blue-grey white-text">
        <h1>Tu carrito de compras</h1>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td>Producto</td>
                    <td>Precio</td>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->pricing }}</td>
                </tr>
            @endforeach
                <tr>
                    <th>Total</th>
                    <th>{{ $total }}</th>
                </tr>
            </tbody>
        </table>
    </div>
@endsection