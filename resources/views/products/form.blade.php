{!! Form::open(['url'=>$url, 'method'=>$method]) !!}
    <br>
    <div class="form-group">
        {!! Form::text('title', $product->title, ['class'=>'form-control', 'placeholder'=>'TITULO DEL PRODUCTO']) !!}
    </div>
    <div class="form-group">
        {!! Form::number('pricing', $product->pricing, ['class'=>'form-control', 'step'=>'0.01', 'placeholder'=>'PRECIO DEL PRODUCTO']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('description', $product->description, ['class'=>'form-control', 'placeholder'=>'DESCRIPCION DEL PRODUCTO']) !!}
    </div>
    <div class="form-group text-right">
        <a href="{{ url('/products') }}">Regresar al listado de productos</a>
        {{ Form::submit('Guardar', ['class'=>'btn btn-success']) }}
    </div>
{!! Form::close() !!}