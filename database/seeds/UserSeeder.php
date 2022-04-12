<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paconava = User::create([
            'name' => 'Francisco Nava',
            'username' => 'paconava',
            'email' => 'paconava01@gmail.com',
            'password' => Hash::make('sadfi123')
        ]);

    }
}
