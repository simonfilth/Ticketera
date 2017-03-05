@extends('layouts.app')

@section('content')
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <div class="row">
        <div class="panel panel-default" style="margin-top: 20px;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-10">
                        <h1 class="panel-title">Eventos</h1>
                    </div> 
                </div>
            </div>
            <div class="text-success" >
                @if(Session::has('message'))
                    {{Session::get('message')}}
                @endif
            </div>               
            <div class="panel-body"> 
                <div class="col-sm-2">
                        <a class="btn btn-primary" href="{{url('organizador/create')}}"><i class="fa fa-plus"></i> Agregar Evento</a>
                </div> <br>              
                <table class="table table-condensed table-striped ">
                    <thead>
                        <th>#</th>
                        <th>Nombre de Evento</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Cupos</th>
                        <th>Disponibles</th>
                    </thead>
                    <tbody>
                        @forelse($eventos as $evento)
                                <tr>
                                    <td>{!!$evento->id!!}</td>
                                    <td>{!!$evento->nombre_evento!!}</td>
                                    <td>{!!$evento->fecha!!}</td>
                                    <td>{!!$evento->hora!!}</td>
                                    @if($evento->cupo_id==1)
                                        <td>Limitado</td>
                                        <td>{!!$evento->cantidad!!}</td>
                                    @else
                                        <td>ilimitado</td>
                                        <td>--</td>
                                    @endif
                                </tr>
                        @empty
                            <td colspan="6" align="center">No hay eventos que mostrar</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-2"></div>

@endsection