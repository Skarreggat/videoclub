@extends('layouts.master')

@section('content')
<div class="row">

	<div class="col-sm-4">
		<img src="{{$movie->poster}}">

	</div>
	<div class="col-sm-8">
		<br>
		<h2>{{$movie->title}}</h2>
		<p>
			<span style="font-weight: bold;">Año: </span>{{$movie->year}}
			<br>
			<span style="font-weight: bold;">Director: </span>{{$movie->director}}
			<br>
			<span style="font-weight: bold;">Restricción de edad: </span>{{$edad}}
		</p>
		<p><span style="font-weight: bold;">Resumen: </span>{{$movie->synopsis}}</p>
		@if($movie->rented == true)
		<form action="{{action('CatalogController@putReturn', $movie->id)}}" 
			method="POST" style="display:inline">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<p><span style="font-weight: bold;">Estado: </span>Película actualmente alquilada</p>
			<button type="submit" class="btn btn-danger" style="display:inline">
				Devolver película
			</button>
		</form>
		@else
		<form action="{{action('CatalogController@putRent', $movie->id)}}" 
			method="POST" style="display:inline">
			{{ method_field('PUT') }}
			{{ csrf_field() }}
			<p><span style="font-weight: bold;">Estado: </span>Película disponible</p>
			<button type="submit" class="btn btn-info" style="display:inline">
				Alquilar película
			</button>
		</form>		
		@endif
		<a href="/catalog/edit/{{$movie->id}}" class="btn btn-warning" style="color: white; border-color: orange;"><i class="fas fa-pencil-alt"> Editar película</i></a>
		<form action="{{action('CatalogController@deleteMovie', $movie->id)}}" 
			method="POST" style="display:inline">
			{{ method_field('DELETE') }}
			{{ csrf_field() }}
			<button type="submit" class="btn btn-danger" style="display:inline">
				Borrar película
			</button>
		</form>	
		<a href="/catalog/index" class="btn btn-default" style="border-color: grey;"><i class="fas fa-angle-left"> Volver al listado</i></a>		

	</div>
</div>

@stop