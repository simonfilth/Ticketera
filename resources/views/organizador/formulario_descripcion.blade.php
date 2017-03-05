<div class="row">
	<div class="col-sm-12">
		<!-- tipos Field -->
		<div class="form-group">
			<div class="row">
				<div class="col-sm-1">

				</div>
				<div class="col-sm-2">
				{!! Form::label('tipo_entrada', 'Tipo:') !!}
				</div>
				<div class="col-sm-3">
				{!! Form::label('precio_entrada', 'Precio:') !!}
				</div>
				<div class="col-sm-6">
					{!! Form::label('descripcion_entrada', 'Descripción:') !!}
				</div>
			</div>
		@foreach(config('options.tipo_entradas') as $key => $entradas)
			<div class="row">
				<div class="col-sm-1">
					{!! Form::checkbox('entrada[]', $key, ['class' => 'form-control']) !!}
				</div>
				<div class="col-sm-2">
					{!! Form::label($entradas) !!}
				</div>
				<div class="col-sm-3">
					{!! Form::text('precio_entrada[]'.$key, null, ['class' => 'form-control']) !!}
				</div>
				<div class="col-sm-6">
					{!! Form::text('descripcion_entrada[]'.$key, null, ['class' => 'form-control']) !!}
				</div>
			</div>
		@endforeach   
			    
		</div>	    
		       
		</div>
	</div>



