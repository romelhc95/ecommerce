{!! Form::open(['url'=>'/products/'.$product->id, 'method'=>'DELETE', 'class'=>'inline-block']) !!}
    {{ Form::Submit('Eliminar', ['class'=>'btn btn-link red-text no-padding no-margin no-transform']) }}
{!! Form::close() !!}