<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        User::create([
			'name' => 'Jonatan',
			'email' => 'kuroko.arevalo@gmail.com',
			'cedula' => '14271000',
			'password' => bcrypt('Jonatelo_568923'),
			'address' => 'Cancun, Quintan Roo, México.',
			'phone' => '9983456795',
			'role' => 'admin',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
		]);

        User::create([
            'name' => 'Paciente 1',
            'email' => 'paciente1@gmail.com',
            'cedula' => '14271001',
            'password' => bcrypt('Jonatelo_568923'),
            'address' => 'Cancun, Quintan Roo, México.',
            'phone' => '9983456795',
            'role' => 'patient',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Medico 1',
            'email' => 'medico1@gmail.com',
            'cedula' => '14271002',
            'password' => bcrypt('Jonatelo_568923'),
            'address' => 'Cancun, Quintan Roo, México.',
            'phone' => '9983456795',
            'role' => 'doctor',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        factory(User::class, 50)->state('patient')->create();
    }
}
