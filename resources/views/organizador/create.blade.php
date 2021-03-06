@extends('layouts.app')

@section('content')
<div class="col-sm-3"></div>
<div class="col-sm-6">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary" style="margin-top: 20px;">
                <div class="panel-heading">
                    <h1 class="panel-title">Agregar Evento</h1>
                </div>                                 
                <div class="panel-body"> 
                    <div class="text-danger" >
                        @if(Session::has('message'))
                        <div class="alert alert-danger" role="alert">
                            <p>Por favor corrija los errores: </p>
                            <ul>                        
                                <li>{{Session::get('message')}}</li>
                            </ul>
                        </div>      
                        @endif
                    </div>              
                    @include('errors.errors')

                    {!! Form::open(['route' =>'organizador.store', 'method' => 'POST', 'name'=>'formulario']) !!}

                        @include('organizador.formulario')
                        <br>
                        @include('organizador.formulario_descripcion')
                        <div class="form-group">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div> 
</div>
<div class="col-sm-3"></div>
@endsection