{!! Form::open(['url'=>'/in_shopping_carts', 'POST', 'class'=>'inline-block']) !!}
    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Agregar al carrito</button>
    {{--{!! Form::submit('Agregar al carrito', ['class'=>'btn btn-info']) !!}--}}
{!! Form::close() !!}