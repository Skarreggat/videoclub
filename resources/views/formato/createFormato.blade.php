@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
	<div class="offset-md-3 col-md-6">
		<div class="card">
			<div class="card-header text-center">
				Crear FORMATO
			</div>
			<div class="card-body" style="padding:30px">

				<form action="{{ url('formato/createFormato') }}" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="tipo">TIPO DE FORMATO</label>
						<input type="text" name="tipo" id="tipo" class="form-control">
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Añadir Formato
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>

@stop