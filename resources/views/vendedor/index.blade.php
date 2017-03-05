@extends('layouts.app')

@section('content')
<div class="col-sm-1"></div>
<div class="col-sm-10">
    <div class="row">
        <div class="panel panel-primary" style="margin-top: 20px;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-10">
                        <h1 class="panel-title">Ventas</h1>
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
                        @if(Auth::user()->tipo_usuario==1)
                        <a class="btn btn-primary" href="{{url('vendedor/create')}}"><i class="fa fa-plus"></i> Nueva venta</a>
                        @endif
                </div> <br>              
                <table class="table table-condensed table-striped ">
                    <thead>
                        
                        <th>Código</th>
                        <th>Asistente</th>
                        <th>Vendedor</th>
                        <th>Evento</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @forelse($ventas as $venta)
                                <tr>
                                    <td>{!!$venta->codigo!!}</td>
                                    <td>{!!$venta->email!!}</td>
                                    <td>{!!$venta->name!!}</td>
                                    <td>{!!$venta->nombre_evento!!}</td>
                                    <td>{!!$venta->precio_entrada!!} $</td>
                                    <td>{!!$venta->descripcion_entrada!!}</td>
                                    <td>{!!$venta->fecha!!}</td>
                                    <td>{!!$venta->hora!!}</td>
                                    @if($venta->status==1)
                                        <td>Canjeado</td>
                                    @else
                                        <td>No canjeado</td>
                                    @endif
                                </tr>
                        @empty
                            <td colspan="9" align="center">No hay ventas que mostrar</td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-1"></div>
@endsection