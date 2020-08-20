<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Descripción</th>
        <th scope="col">Especialidad</th>
        @if($role == 'patient')
        <th scope="col">Médico</th>
        @elseif($role == 'doctor')
        <th scope="col">Paciente</th>
        @endif
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Tipo</th>
        <th scope="col">Opciones</th>
      </tr>
    </thead>
    <tfoot class="thead-light">
      <tr>
        <th scope="col">Descripción</th>
        <th scope="col">Especialidad</th>
        @if($role == 'patient')
        <th scope="col">Médico</th>
        @elseif($role == 'doctor')
        <th scope="col">Paciente</th>
        @endif
        <th scope="col">Fecha</th>
        <th scope="col">Hora</th>
        <th scope="col">Tipo</th>
        <th scope="col">Opciones</th>
      </tr>
    </tfoot>
    <tbody>
    @foreach($pedingAppointments as $appointment)
      <tr>
        <th scope="row">
          {{ $appointment->description }}
        </th>
        <td>
          {{ $appointment->specialty->name}}
        </td>
        @if($role == 'patient')
          <td>{{ $appointment->doctor->name}}</td>
        @elseif($role == 'doctor')
          <td>{{ $appointment->patient->name}}</td>
        @endif
        <td>{{ $appointment->scheduled_date}}</td>
        <td>{{ $appointment->schedule_time_12}}</td>
        <td>{{ $appointment->type}}</td>
        <td>
          @if($role == 'doctor')
          <form method="POST" action="{{url('/appointments/'.$appointment->id.'/confirm')}}" style="display: inline-block;">
            @csrf
            <button type="submit" data-toggle="tooltip" class="btn btn-sm btn-success" title="Confirmar Cita">Confirmar</button>
          </form>
          @endif
          <form method="POST" action="{{url('/appointments/'.$appointment->id.'/cancel')}}" style="display: inline-block;">
          	@csrf
          	<button type="submit" data-toggle="tooltip" class="btn btn-sm btn-danger" title="Cancelar Cita">Cancelar</button>
          </form>
          
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
<div class="card-footer">
  {{ $oldAppointments->links()}}
</div>