@extends('layouts.app')

@section('content')
<div class="col-sm-1"></div>
<div class="col-sm-10">
    <div class="row">
        <div class="panel panel-default" style="margin-top: 20px;">
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
                    </thead>
                    <tbody>
                    @if($ventas==null)
                        <td colspan="5" align="center">No hay ventas que mostrar</td>
                    @else
                        @foreach($ventas as $venta)
                                <tr>
                                    
                                    <td>{!!$venta->codigo!!}</td>
                                    <td>{!!$venta->email!!}</td>
                                    <td>{!!$venta->name!!}</td>
                                    <td>{!!$venta->nombre_evento!!}</td>
                                    <td>{!!$venta->precio_entrada!!} $</td>
                                    <td>{!!$venta->descripcion_entrada!!}</td>
                                    <td>{!!$venta->fecha!!}</td>
                                    <td>{!!$venta->hora!!}</td>

                                   
                                    <td>
                                        <div>
                                           <!--  <a  class="btn btn-primary btn-xs arriba" href="{{ url('user/show', $venta->id)}}" >Ver</a> -->
                                        </div> 

                                        <div>
                                           <!--  <a class="btn btn-warning btn-xs medio" href="{{ url('user/edit', $venta->id)}}"><i class="glyphicon glyphicon-edit"></i></a> -->
                                        </div> 
                                		<div>
                                            <!-- <a class="btn btn-danger btn-xs abajo" href="{ { route('user/destroy', $venta->id)}}" onclick="return confirm('¿Está seguro que quiere eliminar este venta?')"><i class="glyphicon glyphicon-trash"></i></a> -->
                                        </div>
                                  
                                    </td>
                                </tr>

                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-1"></div>
@endsection