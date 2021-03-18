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
  @include('includes.panel.menu.'. auth()->user()->role)
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
    <a class="nav-link" href="{{ url('/charts/appointments/line') }} ">
      <i class="ni ni-chart-bar-32 text-orange"></i> Frecuencias de Citas
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/charts/doctors/column')}} ">
      <i class="ni ni-spaceship text-red"></i> Médicos más Activos
    </a>
  </li>
</ul>
@endif