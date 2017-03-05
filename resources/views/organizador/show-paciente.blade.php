@extends('layouts.app')

@section('content')
<div class="col-sm-9">
    <div class="row">
        <div class="panel panel-default" style="margin-top: 20px;">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-sm-3">
                        @if($paciente==null)
                            {!! Html::image('storage/default-user-image.png', 'Imagen', array('class' => 'img-profile')) !!}
                        @else
                            {!! Html::image('storage/'.$paciente->foto_perfil, 'Imagen', array('class' => 'img-profile')) !!}
                        @endif                    
                    </div>
                    <div class="col-sm-9">
                        <h1 class="panel-title titulo-usuario">{!!$usuarios["name"]!!}</h1>
                    </div>
                </div>           
            </div>  
            <br>           
            <div class="panel-body">
                <div class="text-success" >
                    @if(Session::has('message'))
                        {{Session::get('message')}}
                    @endif
                </div>
               <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-10">
                                <h1 class="panel-title">Datos</h1>
                            </div>
                            <div class="col-sm-2">
                                <a class="btn btn-principal btn-xs pull-right" href="{{ url('user/edit', $usuarios['id'])}}">Editar <i class="glyphicon glyphicon-edit"></i></a>
                            </div>
                        </div>             
                    </div>                                 
                    <div class="panel-body">               
                        <div><strong>Nombre:</strong> {!!$usuarios["name"]!!}</div><br>
                        <div><strong>Email:</strong> {!!$usuarios["email"]!!}</div><br>
                        <div><strong>Teléfono:</strong> {!!$usuarios["telefono"]!!}</div><br>
                        <div><strong>Fecha de Nacimiento:</strong> {!!$usuarios["fecha_nacimiento"]!!}</div><br>
                        <div><strong>Usuario:</strong> {!!$usuarios["username"]!!}</div><br>
                    </div>
                </div>
                @if($paciente==null)
                    @include('pacientes.create')
                @else
                    <div class="panel panel-default" style="margin-top: 20px;">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-8">
                                    <h1 class="panel-title">Otros Datos</h1>
                                </div>
                                <div class="col-sm-4">
                                    <a class="btn btn-principal btn-xs pull-right" href="{{ url('pacientes/edit', $usuarios['id'])}}"> Editar <i class="glyphicon glyphicon-edit"></i></a>
                                    <button type="button" class="btn btn-principal btn-xs" data-toggle="modal" data-target="#editModal" data-whatever="{!!$usuarios['id']!!}"><i class="glyphicon glyphicon-edit"></i>Editar</button>
                                </div>
                            </div>             
                        </div>                                
                        <div class="panel-body">               
                            <div><strong>Tipo de sangre:</strong> {!!$tipo_sangre[0]->nombre!!}</div><br>
                        </div>
                    </div>
                @endif    
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h1 class="panel-title">Citas</h1>
                    </div>                                 
                    <div class="panel-body">               
                         <table>
                            <tr>
                                <td width="50%">

                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {!! Form::model($paciente, ['route' => ['pacientes.update', $usuarios['id']], 'method' => 'patch']) !!}
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
          <input type="submit" value="enviar" name="enviar">enviar
        {!! Form::close() !!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

@endsection