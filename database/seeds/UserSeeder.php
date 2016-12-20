<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::create
        ([
            'email' => 'neyder6101@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Neyder Angarita Osorio',
        ]);

        User::create
        ([
            'email' => 'clarero1611@gmail.com',
            'password' => Hash::make('12345'),
            'nombre' => 'Clarena rodriguez',
        ]);
    }
}   