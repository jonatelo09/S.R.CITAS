@extends('layouts.panel')
@section('title', 'Dashboard')
@section('content')
<div class="row">
<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
  <div class="card card-profile shadow">
    <div class="row justify-content-center">
      <div class="col-lg-3 order-lg-2">
        <div class="card-profile-image">
          <a href="#">
            <img src="{{asset('img/theme/team-1-800x800.jpg')}}" class="rounded-circle">
          </a>
        </div>
      </div>
    </div>
    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
      <div class="d-flex justify-content-between">
        <a href="#" class="btn btn-sm btn-success mr-4">Subir</a>
        <a href="#" class="btn btn-sm btn-danger float-right">Quitar</a>
      </div>
    </div>
    <div class="card-body pt-0 pt-md-4">
      <div class="row">
        <div class="col">
          <div class="card-profile-stats d-flex justify-content-center mt-md-5">
            <div>
              <span class="heading">22</span>
              <span class="description">Consultas</span>
            </div>
            <div>
              <span class="heading">10</span>
              <span class="description">Examenes</span>
            </div>
            <div>
              <span class="heading">89</span>
              <span class="description">Operaciones</span>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center">
        <h3>
          {{Auth::user()->firstname}}<span class="font-weight-light">,{{ $edad }} </span>
        </h3>

        <div class="h5 font-weight-300">
          <i class="ni location_pin mr-2"></i>{{ Auth::user()->city }}, {{ Auth::user()->state}}
        </div>
        <div class="h5 mt-4">
          <i class="ni business_briefcase-24 mr-2"></i>Solution Manager - Creative Tim Officer
        </div>
        <div>
          <i class="ni education_hat mr-2"></i>University of Computer Science
        </div>
        <hr class="my-4" />
      </div>
    </div>
  </div>
</div>
<div class="col-xl-8 order-xl-1">
  <div class="card bg-secondary shadow">
    <div class="card-header bg-white border-0">
      <div class="row align-items-center">
        <div class="col-8">
          <h3 class="mb-0 text-uppercase">BIENVENIDO {{ Auth::user()->firstname }}</h3>
        </div>
        <div class="col-4 text-right">
          <a href="#!" class="btn btn-sm btn-primary">Editar</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <form>
        <h6 class="heading-small text-muted mb-4">Información de usuario</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-username">Usuario</label>
                <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="{{ Auth::user()->username}}" disabled>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-email">Correo Electronico</label>
                <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="{{ Auth::user()->email}}" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-first-name">Nombre</label>
                <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="{{ Auth::user()->firstname}}" disabled>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label class="form-control-label" for="input-last-name">Apellido</label>
                <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="{{ Auth::user()->lastname}}" disabled>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label" for="input-birthday">Cumpleaños</label>
                <input type="text" id="input-birthday" class="form-control form-control-alternative" placeholder="Birthday" value="{{ Auth::user()->birthday}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Address -->
        <h6 class="heading-small text-muted mb-4">Información de Contacto</h6>
        <div class="pl-lg-4">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="form-control-label" for="input-address">Dirreción</label>
                <input id="input-address" class="form-control form-control-alternative" placeholder="Dirección" value="{{ Auth::user()->address}}" type="text" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="input-address">Teléfono</label>
                <input id="input-address" class="form-control form-control-alternative" placeholder="Teléfono" value="{{ Auth::user()->phone}}" type="text" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="input-address">Estado</label>
                <input id="input-address" class="form-control form-control-alternative" placeholder="Estado" value="{{ Auth::user()->state}}" type="text" disabled>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-city">Ciudad</label>
                <input type="text" id="input-city" class="form-control form-control-alternative" placeholder="Ciudad" value="{{ Auth::user()->city}}" disabled>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-country">Pais</label>
                <input type="text" id="input-country" class="form-control form-control-alternative" placeholder="Pais" value="{{ Auth::user()->country}}" disabled>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-control-label" for="input-country">Código Postal</label>
                <input type="text" id="input-postal-code" class="form-control form-control-alternative" placeholder="Código Postal" value="{{ Auth::user()->postal_code}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <hr class="my-4" />
        <!-- Description -->
        <h6 class="heading-small text-muted mb-4">Acerca de mi</h6>
        <div class="pl-lg-4">
          <div class="form-group">
            <label>About Me</label>
            <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ..." disabled>A beautiful Dashboard for Bootstrap 4. It is Free and Open Source.</textarea>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection