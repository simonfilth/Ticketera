@extends('layouts.app')

@section('content')
<div class="col-sm-9">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-principal" style="margin-top: 20px;">
                <div class="panel-heading">
                    <h1 class="panel-title">Editar Usuario {{$usuarios->name}}</h1>
                </div>                                 
                <div class="panel-body"> 
                    @include('errors.errors')

                    {!! Form::model($usuarios, ['route' => ['user.update', $usuarios->id], 'method' => 'patch']) !!}

                        @include('user.formulario')
                        
                        <div class="form-group">
                            {!! Form::submit('Editar', ['class' => 'btn btn-principal']) !!}
                        </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



