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
                        <th>Validar</th>
                    </thead>
                    <tbody>
                    @if($ventas_validar==null)
                        <td colspan="5" align="center">No hay ventas que mostrar</td>
                    @else
                        @foreach($ventas_validar as $venta)
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
                                        <form id="logout-form" action="{{route('portero.store')}}" method="POST" >
                                            {{ csrf_field() }}
                                            <input type="text" name="venta" style="display: none;" value="{{$venta->id}}">
                                            <input type="submit" value="Canjear" class="btn btn-primary btn-xs arriba">
                                        </form>                               
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