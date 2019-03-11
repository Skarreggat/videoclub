@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
	<div class="offset-md-3 col-md-6">
		<div class="card">
			<div class="card-header text-center">
				Modificar película
			</div>
			<div class="card-body" style="padding:30px">

				<form action="{{ url('catalog/edit/' . $movie->id) }}" method="POST">
					{{method_field('PUT')}}
					{{ csrf_field() }}
					<div class="form-group">
						<label for="title">Título</label>
						<input type="text" name="title" id="title" class="form-control" value="{{$movie->title}}">
					</div>

					<div class="form-group">
						<label for="year">Año</label>
						<input type="text" name="year" id="year" class="form-control" value="{{$movie->year}}">
					</div>
					
					<div class="form-group">
						<label for="edad">Restricción de edad</label>
						<select name="id_edades">
							@foreach($edades as $edad)
								@if($edad->id == $movie->id_edades)
									<option value="{{$edad->id}}" selected="selected">{{$edad->edad}}</option>
								@else
									<option value="{{$edad->id}}">{{$edad->edad}}</option>
								@endif
							@endforeach
						</select>
					</div>
					
					<div class="form-group">
						<label for="director">Director</label>
						<input type="text" name="director" id="director" class="form-control" value="{{$movie->director}}">
					</div>

					<div class="form-group">
						<label for="poster">Poster</label>
						<input type="text" name="poster" id="poster" class="form-control" value="{{$movie->poster}}">
					</div>

					<div class="form-group">
						<label for="synopsis">Resumen</label>
						<textarea name="synopsis" id="synopsis" class="form-control" rows="3">{{$movie->synopsis}}</textarea>
					</div>
					<div class="form-group">
						<label for="edad">Formatos disponibles</label><br>
							@foreach($tipos as $tipo)
							@if(in_array($tipo->id, $arrayForms))
							<input type="checkbox" name="formatos[]" value="{{$tipo->id}}" checked>{{$tipo->tipo}}
							@else
							<input type="checkbox" name="formatos[]" value="{{$tipo->id}}" >{{$tipo->tipo}}
							@endif
							@endforeach
					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
							Modificar película
						</button>
					</div>

				</form>

			</div>
		</div>
	</div>
</div>

@stop