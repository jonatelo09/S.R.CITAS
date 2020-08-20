<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->namespace('Admin')->group( function() {
	// Specialty
	Route::get('/specialties','SpecialtyController@index')->name('specialties');
	Route::get('/specialties/create','SpecialtyController@create')->name('specialtiesCreate');
	Route::get('/specialties/{specialty}/edit','SpecialtyController@edit');
	Route::post('/specialties','SpecialtyController@store')->name('specialtiesStore');
	Route::put('/specialties/{specialty}','SpecialtyController@update');
	Route::delete('/specialties/{specialty}/destroy','SpecialtyController@destroy');

	// Doctors
	Route::resource('/doctors','DoctorController');

	// Patients
	Route::resource('/patients', 'PatientController');
});

Route::middleware(['auth','doctor'])->namespace('Doctor')->group( function() {
	Route::get('/schedule','ScheduleController@edit');
	Route::post('/schedule','ScheduleController@store');
});

Route::middleware('auth')->group( function () {
	Route::get('/appointments/create', 'AppointmentController@create');
	Route::post('/appointments', 'AppointmentController@store');
	/*
	/ appointments -> Verificar
	/ -> que variables pasar a la vista
	/ -> 1 único blade (condiciones)
	*/
	Route::get('/appointments', 'AppointmentController@index');
	Route::get('/appointments/{appointment}', 'AppointmentController@show');	

	Route::get('/appointments/{appointment}/cancel', 'AppointmentController@showCancelFrom');
	Route::post('/appointments/{appointment}/cancel', 'AppointmentController@cancel');
	Route::post('/appointments/{appointment}/confirm', 'AppointmentController@confirm');

	// JSON
	Route::get('/specialties/{specialty}/doctors','Api\SpecialtyController@doctors');
	Route::get('/schedule/hours', 'Api\ScheduleController@hours');
});



