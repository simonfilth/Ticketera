{!! csrf_field() !!}
<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre_evento', 'Nombre del evento:') !!}
    {!! Form::text('nombre_evento', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('fecha', 'Fecha:') !!}
    {!! Form::date('fecha', null, ['class' => 'form-control datepicker', 'readonly' => 'true']) !!}
</div>

<div class="form-group">
    {!! Form::label('cupos', 'Cupos:') !!}
    {!!Form::select('cupos', config('options.cupos'), null, ['class' => 'form-control', 'onchange'=>"if(this.value==1) {document.getElementById('cant').disabled = false} else {document.getElementById('cant').disabled = true} "])!!}
</div>
<div class="form-group">
    {!! Form::label('cantidad', 'Cantidad de Personas:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control', 'id'=>'cant']) !!}
</div>

<label for="hora_inicio">Hora de Inicio</label>
<select class="form-control" name="hora_inicio" id="inicio">
@foreach(config('options.horas') as $key => $hora)
  <option value="{{$key}}">{{$hora}}</option>
@endforeach
</select>

