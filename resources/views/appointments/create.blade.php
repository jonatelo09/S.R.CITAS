@extends('layouts.panel')
@section('title', 'Nueva Cita')

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
		<form method="POST" action="{{url('appointments')}} ">
			@csrf
			<div class="form-group">
				<label for="description">Descripción</label>
				<input type="text" name="description" value="{{old('description')}} " id="description" class="form-control" required>
			</div>
			<div class="form-row">
			    <div class="form-group col-md-6">
			      	<label for="specialty">Eliga la espcialidad:</label>
					<select class="form-control" name="specialty_id" id="specialty" required>
						<option value="">Seleccione una especialidad</option>
						@foreach($specialties as $specialty)
							<option value="{{$specialty->id}}" @if(old('specialty_id') == $specialty->id) selected @endif>{{$specialty->name}}</option>
						@endforeach
					</select>
			    </div>
			    <div class="form-group col-md-6">
			    	<label for="doctor">Médicos Disponibles</label>
					<select class="form-control" id="doctor" name="doctor_id">
						@foreach($doctors as $doctor)
							<option value="{{$doctor->id}}" @if(old('doctor_id') == $doctor->id) selected @endif>{{$doctor->name}}</option>
						@endforeach
					</select>
			    </div>
			</div>
			<div class="form-group">
				<label for="cedula">Fecha de Cita</label>
				<div class="input-group">
			    	<div class="input-group-prepend">
			            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
			        </div>
			        <input class="form-control datepicker" placeholder="Select date" 
			        id="date" name="scheduled_date"  type="text" 
			        value="{{ old('scheduled_date', date('Y-m-d')) }}" 
			        data-date-format="yyyy-mm-dd" 
			        data-date-start-date="{{date('Y-m-d')}}">
			    </div>
			</div>
			<div class="form-group">
				<label for="address">Hora de Cita</label>
				<div id="hours">
					<div class="alert alert-info" role="alert">
						Selecciona una fecha y un médico, para ver sus horas disponibles.
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="type">Tipo de Consulta</label>
				<div class="custom-control custom-radio mb-3">
				  <input type="radio" id="type1" name="type" class="custom-control-input" 
				  @if(old('type','Consulta') == 'Consulta') checked @endif value="Consulta">

				  <label class="custom-control-label" for="type1">Consulta</label>
				</div>
				<div class="custom-control custom-radio mb-3">
				  <input type="radio" id="type2" name="type" class="custom-control-input" 
				  @if(old('type') == 'Examen') checked @endif value="Examen">

				  <label class="custom-control-label" for="type2">Examen</label>
				</div>
				<div class="custom-control custom-radio mb-3">
				  <input type="radio" id="type3" name="type" class="custom-control-input"
				  value="Operación" @if(old('type') == 'Operación') checked @endif>

				  <label class="custom-control-label" for="type3">Operación</label>
				</div>
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
	<script src="{{asset('vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('/js/appointment/create.js')}} "></script>

@endsection