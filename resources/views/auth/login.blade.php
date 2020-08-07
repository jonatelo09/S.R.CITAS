@extends('layouts.form')
@section('title','Inicio de Sesión')
@section('content')
<div class="row justify-content-center">
	<div class="col-lg-5 col-md-7">
	  <div class="card bg-secondary shadow border-0">
	    {{-- <div class="card-header bg-transparent pb-5">
	      <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
	      <div class="btn-wrapper text-center">
	        <a href="#" class="btn btn-neutral btn-icon">
	          <span class="btn-inner--icon"><img src="{{asset('img/icons/common/facebook.svg')}}"></span>
	          <span class="btn-inner--text">Facebook</span>
	        </a>
	        <a href="#" class="btn btn-neutral btn-icon">
	          <span class="btn-inner--icon"><img src="{{asset('img/icons/common/google.svg')}}"></span>
	          <span class="btn-inner--text">Google</span>
	        </a>
	      </div>
	    </div> --}}
	    <div class="card-body px-lg-5 py-lg-5">
	    	@if ($errors->any())
		      	<div class="alert alert-danger alert-dismissible fade show" role="alert">
				    <span class="alert-text"><strong>Error!</strong> {{$errors->first()}} </span>
				    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				        <span aria-hidden="true">&times;</span>
				    </button>
				</div>
			@else
				<div class="text-center text-muted mb-4">
			       <small>Inicie sesión con sus credenciales</small>
			    </div>
	      	@endif
	        
	      <form method="POST" action="{{ route('login') }}" role="form">
	      	@csrf
	      	
	        <div class="form-group mb-3">
	          <div class="input-group input-group-alternative">
	            <div class="input-group-prepend">
	              <span class="input-group-text"><i class="ni ni-email-83"></i></span>
	            </div>
	            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
	            {{-- @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
	          </div>
	        </div>
	        <div class="form-group">
	          <div class="input-group input-group-alternative">
	            <div class="input-group-prepend">
	              <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
	            </div>
	            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
	            {{-- @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror --}}
	          </div>
	        </div>
	        <div class="custom-control custom-control-alternative custom-checkbox">
	          {{-- <input class="custom-control-input" id="customCheckLogin" type="checkbox"> --}}

	          <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	          <label class="custom-control-label" for="remember">
	            <span class="text-muted">Recuerdame</span>
	          </label>
	        </div>
	        <div class="text-center">
	          <button type="submit" class="btn btn-primary my-4">Iniciar Sesion</button>
	        </div>
	      </form>
	    </div>
	  </div>
	  <div class="row mt-3">
	    <div class="col-6">
	      {{-- <a href="#" class="text-light"><small>Forgot password?</small></a> --}}
		    @if (Route::has('password.request'))
	            <a class="text-light" href="{{ route('password.request') }}">
	                <small>Olvidaste tu contraseña?</small>
	            </a>
	        @endif
	    </div>
	    <div class="col-6 text-right">
	      <a href="{{route('register')}} " class="text-light"><small>Crear una cuenta</small></a>
	    </div>
	  </div>
	</div>
</div>
@endsection