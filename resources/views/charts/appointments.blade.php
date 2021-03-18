@extends('layouts.panel')
@section('title', 'Reporte: Frecuencia de Citas')

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
<script type="text/javascript">
	Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: 'Registro de Citas Mensuales'
    },
    xAxis: {
        categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
    },
    yAxis: {
        title: {
            text: 'Cantidad de citas'
        }
    },
    plotOptions: {
        line: {
            dataLabels: {
                enabled: true
            },
            enableMouseTracking: false
        }
    },
    series: [{
        name: 'Citas Registradas',
        // imprimir el formato de cadena
        data: @json($counts)
    }]
});
</script>
@endsection