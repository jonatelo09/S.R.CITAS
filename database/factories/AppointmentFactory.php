<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use App\User;
use Faker\Generator as Faker;

$factory->define(App\Appointment::class, function (Faker $faker) {
	$doctorsIds = User::doctors()->pluck('id');
	$patiendsIds = User::patients()->pluck('id');

	$date = $faker->dateTimeBetween('-1 years', 'now');
	$scheduled_date = $date->format('Y-m-d');
	$scheduled_time = $date->format('H:i:s');

	$type = ['Consulta','Examen','Operacion'];
	$status = ['Atendida', 'Cancelada'];

    return [
        'description' => $faker->sentence(5),
        'specialty_id' => $faker->numberBetween(1,3),
        'doctor_id' => $faker->randomElement($doctorsIds),
        'patient_id' => $faker->randomElement($patiendsIds),
        'scheduled_date' => $scheduled_date,
        'scheduled_time' => $scheduled_time,
        'type' => $faker->randomElement($type),
        'status' => $faker->randomElement($status),
    ];
});
