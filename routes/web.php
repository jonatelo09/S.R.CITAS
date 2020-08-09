<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Specialty
Route::get('/specialties','SpecialtyController@index')->name('specialties');
Route::get('/specialties/create','SpecialtyController@create')->name('specialtiesCreate');
Route::get('/specialties/{specialty}/edit','SpecialtyController@edit');
Route::post('/specialties','SpecialtyController@store')->name('specialtiesStore');
Route::put('/specialties/{specialty}','SpecialtyController@update');
Route::delete('/specialties/{specialty}/destroy','SpecialtyController@destroy');

// Doctors

Route::resource('/doctors','DoctorController');