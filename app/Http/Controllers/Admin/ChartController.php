<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

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
}