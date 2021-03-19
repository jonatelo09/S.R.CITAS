<?php

use App\Appointment;
use Illuminate\Database\Seeder;
use Faker\Factory;

class AppointmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(Appointment::class, 500)->create();
        
    }
}
