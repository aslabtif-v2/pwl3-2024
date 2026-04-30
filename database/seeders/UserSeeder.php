<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;

// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i<5; $i++){
            $npm = $faker->unique()->numerify('5520######');
        FacadesDB::table('users')->insert([
                    'username' => $faker->username(),
                    'first_name' => $faker->firstName(),
                    'last_name' => $faker->lastName(),
                    'npm' => $npm,
                    'email' => $faker->unique()->safeEmail(),
                    'password' => FacadesHash::make('password')
                ]);

        }

        // DB::table('users')->insert([
        //     'firstname' => 'Asep',
        //     'lastname' => 'Ujang',
        //     'npm' => '5520123457',
        //     'email' => 'asep@gmail.com',
        //     'password' => Hash::make('password')
        // ]);
    }
}
