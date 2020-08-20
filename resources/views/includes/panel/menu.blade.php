<!-- Heading -->
<h6 class="navbar-heading text-muted">
  @if(auth()->user()->role == 'admin')
  Gestionar Datos
  @else
  Menú
  @endif
</h6>
<!-- Navigation -->
<ul class="navbar-nav">
  @if(auth()->user()->role == 'admin')
  <li class="nav-item">
    <a class="nav-link" href="{{route('home')}} ">
      <i class="ni ni-tv-2 text-primary"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('specialties')}} ">
      <i class="ni ni-planet text-blue"></i> Gestionar Especialidades
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/doctors')}} ">
      <i class="ni ni-single-02 text-orange"></i> Gestionar Médicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{url('/patients')}} ">
      <i class="ni ni-satisfied text-yellow"></i> Gestionar Pacientes
    </a>
  </li>
  @elseif(auth()->user()->role == 'doctor')
  <li class="nav-item">
    <a class="nav-link" href="{{url('/schedule')}}">
      <i class="ni ni-calendar-grid-58 text-danger"></i> Gestionar Horario
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=" ">
      <i class="ni ni-time-alarm text-blue"></i> Mis Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="">
      <i class="ni ni-satisfied text-info"></i> Mis Pacientes
    </a>
  </li>
  @else
  <li class="nav-item">
    <a class="nav-link" href="{{url('/appointments/create')}}">
      <i class="ni ni-send text-blue"></i> Reservar Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/appointments')}}">
      <i class="ni ni-calendar-grid-58 text-info"></i> Mis Citas
    </a>
  </li>

  @endif
  <li class="nav-item">
    <a class="nav-link" href="" onclick="event.preventDefault(); document.getElementById('formLogout').submit()">
      <i class="ni ni-key-25 "></i> Cerrar Sesión
    </a>
    <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
      @csrf
    </form>
  </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
@if(auth()->user()->role == 'admin')
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
      <i class="ni ni-chart-bar-32 text-orange"></i> Frecuencias de Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
      <i class="ni ni-spaceship text-red"></i> Médicos más Activos
    </a>
  </li>
</ul>
@endif