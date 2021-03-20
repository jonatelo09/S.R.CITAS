<?php

use App\User;
use Illuminate\Database\Seeder;

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
			'username' => 'Jonatan96',
            'firstname' => 'Jonatan',
            'lastname' => 'Arevalo',
			'email' => 'kuroko.arevalo@gmail.com',
			'cedula' => '14271000',
			'password' => bcrypt('Jonatelo_568923'),
			'address' => 'Cancun, Quintan Roo, México.',
			'phone' => '9983456795',
            'birthday' => '1996-04-09',
            'city' => 'Cancun',
            'state' => 'Quintana Roo',
            'country' => 'México',
            'postal_code' => '77560',
			'role' => 'admin',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
		]);

        User::create([
            'username' => 'Paciente1',
            'firstname' => 'Juan',
            'lastname' => 'Perez',
            'email' => 'paciente1@gmail.com',
            'cedula' => '14271001',
            'password' => bcrypt('Jonatelo_568923'),
            'address' => 'Cancun, Quintan Roo, México.',
            'phone' => '9983456795',
            'birthday' => '1996-04-09',
            'city' => 'Cancun',
            'state' => 'Quintana Roo',
            'country' => 'México',
            'postal_code' => '77560',
            'role' => 'patient',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        User::create([
            'username' => 'Medico1',
            'firstname' => 'Jorge',
            'lastname' => 'Lopez',
            'email' => 'medico1@gmail.com',
            'cedula' => '14271002',
            'password' => bcrypt('Jonatelo_568923'),
            'address' => 'Cancun, Quintan Roo, México.',
            'phone' => '9983456795',
            'birthday' => '1996-04-09',
            'city' => 'Cancun',
            'state' => 'Quintana Roo',
            'country' => 'México',
            'postal_code' => '77560',
            'role' => 'doctor',
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        factory(User::class, 50)->state('patient')->create();
    }
}
