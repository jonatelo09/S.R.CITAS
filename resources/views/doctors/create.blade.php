@extends('layouts.panel')
@section('styles')
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection
@section('title', 'Nuevo Doctor')


@section('content')
<div class="card shadow">
	<div class="card-header border-0">
	  <div class="col align-items-center">
	  	@if ($errors->any())
	      	<div class="alert alert-danger alert-dismissible fade show" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			        <span aria-hidden="true">&times;</span>
			    </button>
			    <ul>
			    	@foreach($errors->all() as $error)
			    		<li><span class="alert-text"><strong>Error!</strong> {{$error}} </span></li>
			    	@endforeach
			    </ul>
			</div>
		@endif
	    <div class="col">
	      <h3 class="mb-0">@yield('title')</h3>
	    </div>
	  </div>
	</div>
	<div class="card-body">
		<form method="POST" action="{{url('doctors')}} ">
			@csrf
			<div class="form-group">
				<label for="name">Nombre del Médico</label>
				<input type="text" value="{{old('name')}} " class="form-control" name="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email del Médico</label>
				<input type="text" value="{{old('email')}} " class="form-control" name="email" required>
			</div>
			<div class="form-group">
				<label for="cedula">Cédula del Médico</label>
				<input type="text" value="{{old('cedula')}} " class="form-control" name="cedula" required>
			</div>
			<div class="form-group">
				<label for="address">Dirección del Médico</label>
				<input type="text" value="{{old('address')}} " class="form-control" name="address" required>
			</div>
			<div class="form-group">
				<label for="phone">Télefono del Médico</label>
				<input type="text" value="{{old('phone')}} " class="form-control" name="phone" required>
			</div>
			<div class="form-group">
				<label for="password">Contraseña del Médico</label>
				<input type="text" value="{{ Str::random(6)}}" class="form-control" name="password" required>
			</div>
			<div class="form-group">
				<label for="specialties">Especialidades</label>
				<select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-default" multiple title="Seleccione una o varias">
					@foreach($specialties as $specialty)
					<option value="{{$specialty->id}}">{{$specialty->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<button type="submit" class="btn btn-md btn-success">Guardar</button>
					<a href="{{url('doctors')}} " class="btn btn-secondary btn-md">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('script')
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection