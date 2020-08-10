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
        factory(User::class, 50)->create();

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
    }
}
