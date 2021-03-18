@extends('layouts.panel')
@section('title', 'Reporte: Médicos más Activos')

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
		<div id="container" class="container">
			
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="{{ asset('js/charts/doctors.js')}} " type="text/javascript"></script>
@endsection