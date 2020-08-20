<div class="table-responsive">
  <!-- Projects table -->
  <table class="table align-items-center table-flush">
    <thead class="thead-light">
      <tr>
        <th scope="col">Descripción</th>
        <th scope="col">Especialidad</th>
        <th scope="col">Médico</th>
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
        <th scope="col">Médico</th>
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
        <td>{{ $appointment->doctor->name}}</td>
        <td>{{ $appointment->scheduled_date}}</td>
        <td>{{ $appointment->schedule_time_12}}</td>
        <td>{{ $appointment->type}}</td>
        <td>
          <form method="POST" action="{{url('/appointments/'.$appointment->id.'/cancel')}}" style="display: inline-block;">
          	@csrf
          	<button type="submit" class="btn btn-sm btn-danger">Cancelar</button>
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