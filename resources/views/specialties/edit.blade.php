@extends('layouts.panel')
@section('title', 'Editar Especialidades')

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
		<form method="POST" action="{{url('/specialties/'.$specialty->id)}} ">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Nombre de la Especialidad</label>
				<input type="text" value="{{old('name',$specialty->name)}}" class="form-control" name="name" required>
			</div>
			<div class="form-group">
				<label for="description">Descripción de la Especialidad</label>
				<input type="text" value="{{old('description',$specialty->description)}}" class="form-control" name="description" required>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<button type="submit" class="btn btn-md btn-success">Actualizar</button>
					<a href="{{route('specialties')}} " class="btn btn-secondary btn-md">Cancelar</a>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection