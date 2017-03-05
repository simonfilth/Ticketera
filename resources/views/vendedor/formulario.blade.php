<div class="form-group">
    {!! Form::label('codigo', 'Código:') !!}
    {!! Form::text('codigo', $codigo, ['class' => 'form-control', 'readonly' => 'true']) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, ['class' => 'form-control',]) !!}
</div>
@if($eventos==null)
    <p>No hay eventos Disponibles</p>
@else
<label for="evento_id">Eventos Disponibles</label>
<select class="form-control" name="evento_id">
@foreach($eventos as $evento)
  <option value="{{$evento->id}}">
  	  Nombre: {{$evento->nombre_evento}},
	  Fecha: {{$evento->fecha}},
	    {{$evento->descripcion_entrada}},
	  Precio: {{$evento->precio_entrada}}
  </option>
@endforeach
</select>
@endif

