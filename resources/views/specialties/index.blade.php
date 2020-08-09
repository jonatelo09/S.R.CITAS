@extends('layouts.panel')
@section('title', 'Especialidades')

@section('content')
<div class="card shadow">
	<div class="card-header border-0">
	  <div class="row align-items-center">
	    <div class="col">
	      <h3 class="mb-0">@yield('title')</h3>
	    </div>
	    <div class="col text-right">
	      <a href="{{route('specialtiesCreate')}} " class="btn btn-sm btn-success">Nueva Especialidad</a>
	    </div>
	  </div>
	</div>
	@if(session('notifications'))
	<div class="card-body">
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <span class="alert-text"><strong>Success!</strong> {{session('notifications')}} </span>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		    </button>
		</div>
	</div>
	@endif
	<div class="table-responsive">
	  <!-- Projects table -->
	  <table class="table align-items-center table-flush">
	    <thead class="thead-light">
	      <tr>
	        <th scope="col">Nombre</th>
	        <th scope="col">Descripción</th>
	        <th scope="col">Opciones</th>
	      </tr>
	    </thead>
	    <tfoot class="thead-light">
	      <tr>
	        <th scope="col">Nombre</th>
	        <th scope="col">Descripción</th>
	        <th scope="col">Opciones</th>
	      </tr>
	    </tfoot>
	    <tbody>
	    @foreach($specialties as $specialty)
	      <tr>
	        <th scope="row">
	          {{ $specialty->name }}
	        </th>
	        <td>
	          {{ $specialty->description}}
	        </td>
	        <td>
	          <a href="{{url('/specialties/'.$specialty->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
	          <form method="POST" action="{{url('/specialties/'.$specialty->id.'/destroy')}}" style="display: inline-block;">
	          	@csrf
	          	@method('DELETE')
	          	<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
	          </form>
	          
	        </td>
	      </tr>
	     @endforeach
	    </tbody>
	  </table>
	  {{ $specialties->links()}}
	</div>
</div>
@endsection