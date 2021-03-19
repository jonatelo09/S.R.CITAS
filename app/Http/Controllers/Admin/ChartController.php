<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Illuminate\Http\Request;

class ChartController extends Controller
{
	// created_at -> datatime()
    public function appointments()
    {
		$monthlyCounts = Appointment::select(
			DB::raw('MONTH(created_at) as month'),
			DB::raw('COUNT(1) as count')
		)->groupBy('month')->get()->toArray();

		//[ ['month' => 11, 'count' => 3 ]]
		//[ 0,0,0,...,0,0,0,0,]

		$counts = array_fill(0, 12, 0); //index, qty, value

		foreach ($monthlyCounts as $monthlyCount) {
			$index = $monthlyCount['month']-1;
			$counts[$index] = $monthlyCount['count'];
		}

		
    	return view('charts.appointments', compact('counts'));
    }

    public function doctors()
    {
    	return view('charts.doctors');
    }

    public function doctorsJson()
    {
    	$doctors = User::doctors()
    		->select('name')
    		->withCount(['attendedAppointment', 'cancelledAppointment'])
    		->orderBy('attended_appointment_count', 'desc')
    		->take(5)
    		->get();
    	

    	$data = [];
    	$data['categories'] = $doctors->pluck('name');
    	
    	$series = [];
    	$series1['name'] = 'Citas Atendidas';
    	$series1['data'] = $doctors->pluck('attended_appointment_count'); //Atendidas
    	$series2['name'] = 'Citas Canceladas';
    	$series2['data'] = $doctors->pluck('cancelled_appointment_count'); //Canceladas
    	$series[] = $series1;
    	$series[] = $series2;
    	$data['series'] = $series;

    	return $data; // {categories: [ 'A', 'B' ], series: [ 1, 2 ]}
    }
}