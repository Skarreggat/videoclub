@extends('layouts.master')

@section('content')
<div class="row">
	<a href="createFormato">
		<button type="button" class="btn btn-warning">Añadir nuevo formato</button>
	</a>
</div>
<div class="row" id="divTablaFormato">
	<table class='table table-hover table-responsive table-bordered' id="tablaFormato">
		<tr>
			<th>Nº</th>
			<th>Formato</th>
			<th>Acciones</th>
		</tr>
		@foreach($arrayFormatos as $formato)
		<tr>
			<td>
				{{$formato->id}}
			</td>
			<td>
				{{$formato->tipo}}
			</td>
			<td>
				<a href="editFormato/{{$formato->id}}"><button type="button" class="btn btn-primary">EDITAR</button></a>
				<form action="{{action('CatalogController@deleteFormato', $formato->id)}}" 
					method="POST" style="display:inline">
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-danger" style="display:inline">BORRAR</button>
				</form>	
			</td>
		</tr>
		@endforeach
	</table>
</div>
@stop