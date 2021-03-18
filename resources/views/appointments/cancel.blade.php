@extends('layouts.panel')
@section('title', 'Cancelar Cita')

@section('content')
<div class="card shadow">
	<div class="card-header border-0">
	  <div class="row align-items-center">
	    <div class="col">
	      <h3 class="mb-0">@yield('title')</h3>
	    </div>
	  </div>
	</div>
	
	<div class="card-body">
		@if(session('notifications'))
		<div class="alert alert-success alert-dismissible fade show" role="alert">
		    <span class="alert-text"><strong>Success!</strong> {{session('notifications')}} </span>
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">&times;</span>
		    </button>
		</div>
		@endif
		@if($role == 'patient')
		<p>
			Estas a punto de cancelar tu cita con el médico 
			<span class="font-weight-bold">{{$appointment->doctor->name}}</span> 
			(de la especialidad <span class="font-weight-bold">{{$appointment->specialty->name}}</span> ), 
			para el dia <span class="font-weight-bold">{{$appointment->scheduled_date}}</span>:
		</p>
		@elseif($role == 'doctor')
		<p>
			Estas a punto de cancelar tu cita reservada con el paciente 
			<span class="font-weight-bold">{{$appointment->patient->name}}</span> 
			(de la especialidad <span class="font-weight-bold">{{$appointment->specialty->name}}</span> ), 
			para el dia <span class="font-weight-bold">{{$appointment->scheduled_date}}</span>,
			para la hora <span class="font-weight-bold">{{$appointment->scheduled_time_12}}</span>:
		</p>
		@else
		<p>
			Estas a punto de cancelar la cita reservada por 
			el paciente <span class="font-weight-bold">{{$appointment->patient->name}}</span>
			para ser atendido por el médico <span class="font-weight-bold">{{$appointment->doctor->name}}</span> 
			(de la especialidad <span class="font-weight-bold">{{$appointment->specialty->name}}</span> ), 
			el dia <span class="font-weight-bold">{{$appointment->scheduled_date}}</span>
			para la hora <span class="font-weight-bold">{{$appointment->scheduled_time_12}}</span>::
		</p>
		@endif
		<form method="post" action="{{url('/appointments/'.$appointment->id.'/cancel')}} ">
			@csrf
			<div class="form-group">
				<label for="justification" class="col-form-label">Por favor cuéntenos el motivo de la cancelacion:</label>
				<textarea type="text" id="justification" name="justification" rows="3" class="form-control" required></textarea>
			</div>

			<button class="btn btn-danger" type="submit">Cancelar Cita</button>
			<a href="{{url('appointments')}} " class="btn btn-default">Volver al listado de citas sin cancelar</a>
		</form>
	</div>
	
</div>
@endsection