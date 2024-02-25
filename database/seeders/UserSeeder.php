<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User One',
                'email' => 'userone@test.com',
                'role' => 'user',
                'password' => Hash::make('supersecretpassword')
            ],
            [
                'name' => 'User Two',
                'email' => 'usertwo@test.com',
                'role' => 'user',
                'password' => Hash::make('supersecretpassword')
            ],
            [
                'name' => 'Driver One',
                'email' => 'driverone@test.com',
                'role' => 'driver',
                'password' => Hash::make('supersecretpassword')
            ],
            [
                'name' => 'Driver Two',
                'email' => 'drivertwo@test.com',
                'role' => 'driver',
                'password' => Hash::make('supersecretpassword')
            ]
        ];

        foreach ($users as $u) {
            $user = User::create($u);

            event(new Registered($user));
        }
    }
}
