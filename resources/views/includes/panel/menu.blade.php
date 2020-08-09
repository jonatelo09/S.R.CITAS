<!-- Heading -->
<h6 class="navbar-heading text-muted">Gestionar Datos</h6>
<!-- Navigation -->
<ul class="navbar-nav">
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
    <a class="nav-link" href="./examples/profile.html">
      <i class="ni ni-satisfied text-yellow"></i> Gestionar Pacientes
    </a>
  </li>
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