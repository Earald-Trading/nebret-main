<?php

namespace Database\Seeders;

use App\Models\ListingType;
use App\Models\HouseType;
use App\Models\State;
use App\Models\User;
use App\Models\Upload;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
            'password' => Hash::make('secret'),
            'is_admin' => true
        ]);

        User::create([
            'first_name' => 'Menoriya',
            'last_name' => 'User',
            'email' => 'u@menoriya.com',
            'password' => Hash::make('secret'),
        ]);

        User::factory()->count(200)->create();
        Upload::factory()->count(100)->create();
    }
}
