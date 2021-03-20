<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\diffForHumans;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $nacimiento = auth()->user()->birthday;

        $nac_parse = Carbon::parse($nacimiento);

        //dd($nac_parse);
        $actual = Carbon::now();
        //dd($actual);

        $edad =  $actual->diffForHumans($nac_parse, $actual);
        dd($edad);

        return view('profile', compact('edad'));
    }
}
