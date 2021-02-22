<?php

namespace Database\Seeders;

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

        Upload::create([
            'user_id' => User::where('email', 'u@menoriya.com')->first()->id,
            'admin_id' => User::where('email', 'a@menoriya.com')->first()->id,
            'images' => '37f2ac7b9c11c994008753ef70b7ebd3f42f4b63f0123da7e14fd8cd6da7dddd',
            'youtube_id' => 'jM3GvD3DKbw',
            'type' => 'Apartement',
            'beds' => 3,
            'baths' => 2,
            'footprint' => 125,
            'lot' => 300,
            'year' => 2001,
            'price' => 40000*100,
            'latitude' => 9.00611,
            'longitude' =>  38.75471,
            'subcity' => 9, // 'Lideta'
            'wereda' => 4,
            'houseno' => 'New',
            'featured' => 1,
            'openhouse' => 1,
            'newconstruction' => 0,
            'logline' => <<<EOL
This immaculately presented apartment is set amongst manicured grounds within a private and secure complex. As a resident, you will have access to lifestyle amenities including a lap pool, gymnasium, communal terraces, concierge service and basement parking.

The floorplan incorporates 2 bedrooms, the main with built-in robe and ensuite, a study nook, modern kitchen with quality appliances, luxurious bathroom, a cleverly concealed laundry, and a spacious living/dining area. The generously proportioned interior flows effortlessly from the open-plan living space to the private covered balcony from which you can admire the views of the garden and beyond.
EOL
        ]);

        User::factory()->count(200)->create();
    }
}
