<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'first_name' => 'Menoriya',
            'last_name' => 'Admin',
            'email' => 'a@menoriya.com',
            'password' => \Hash::make('secret'),
            'is_admin' => true
        ]);

        User::create([
            'first_name' => 'Menoriya',
            'last_name' => 'User',
            'email' => 'u@menoriya.com',
            'password' => \Hash::make('secret'),
        ]);
    }
}
