@extends('layouts.panel')
@section('title', 'Pacientes')

@section('content')
<div class="card shadow">
	<div class="card-header border-0">
	  <div class="row align-items-center">
	    <div class="col">
	      <h3 class="mb-0">@yield('title')</h3>
	    </div>
	    <div class="col text-right">
	      <a href="{{url('/patients/create')}} " class="btn btn-sm btn-success">Nuevo Paciente</a>
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
	        <th scope="col">E-Mail</th>
	        <th scope="col">Cédula</th>
	        <th scope="col">Télefono</th>
	        <th scope="col">Opciones</th>
	      </tr>
	    </thead>
	    <tfoot class="thead-light">
	      <tr>
	        <th scope="col">Nombre</th>
	        <th scope="col">E-Mail</th>
	        <th scope="col">Cédula</th>
	        <th scope="col">Télefono</th>
	        <th scope="col">Opciones</th>
	      </tr>
	    </tfoot>
	    <tbody>
	    @foreach($patients as $patient)
	      <tr>
	        <th scope="row">
	          {{ $patient->username }}
	        </th>
	        <td>
	          {{ $patient->email}}
	        </td>
	        <td>{{ $patient->cedula}}</td>
	        <td>{{ $patient->phone}}</td>
	        <td>
	          <a href="{{url('/patients/'.$patient->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
	          <form method="POST" action="{{url('/patients/'.$patient->id)}}" style="display: inline-block;">
	          	@csrf
	          	@method('DELETE')
	          	<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
	          </form>
	          
	        </td>
	      </tr>
	     @endforeach
	    </tbody>
	  </table>
	</div>
	<div class="card-footer">
		{{ $patients->links()}}
	</div>
</div>
@endsection