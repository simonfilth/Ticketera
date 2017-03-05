@extends('layouts.app')

@section('content')
<div class="col-sm-3"></div>
<div class="col-sm-6">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-primary" style="margin-top: 20px;">
                <div class="panel-heading">
                    <h1 class="panel-title">Venta de Entrada</h1>
                </div>                                 
                <div class="panel-body">               
                    @include('errors.errors')

                    {!! Form::open(['route' =>'vendedor.store', 'method' => 'POST']) !!}

                        @include('vendedor.formulario')
                        <br>
                        @if($eventos==null)
                            <p>Espere que el organizador agregue mas eventos</p>
                        @else
                        <div class="form-group">
                            {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                        </div>
                        @endif
                    {!! Form::close() !!}
                </div>
            </div>
        </div>  
    </div> 
</div>
<div class="col-sm-3"></div>
@endsection