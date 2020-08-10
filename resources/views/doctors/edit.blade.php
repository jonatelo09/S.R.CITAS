@extends('layouts.panel')
@section('title', 'Editar Doctor')

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
		<form method="POST" action="{{url('doctors/'.$doctor->id)}}">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Nombre del Médico</label>
				<input type="text" value="{{old('name',$doctor->name)}}" class="form-control" name="name" required>
			</div>
			<div class="form-group">
				<label for="email">Email del Médico</label>
				<input type="text" value="{{old('email',$doctor->email)}}" class="form-control" name="email" required>
			</div>
			<div class="form-group">
				<label for="cedula">Cédula del Médico</label>
				<input type="text" value="{{old('cedula',$doctor->cedula)}}" class="form-control" name="cedula" required>
			</div>
			<div class="form-group">
				<label for="address">Dirección del Médico</label>
				<input type="text" value="{{old('address',$doctor->address)}}" class="form-control" name="address" required>
			</div>
			<div class="form-group">
				<label for="phone">Télefono del Médico</label>
				<input type="text" value="{{old('phone',$doctor->phone)}}" class="form-control" name="phone" required>
			</div>
			<div class="form-group">
				<label for="password">Contraseña del Médico</label>
				<input type="text" value="" class="form-control" name="password">
				<p class="text-primary">Ingrese un valor sólo si desea modificar la contraseña.</p>
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