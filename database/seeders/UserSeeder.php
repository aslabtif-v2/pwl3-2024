<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'pustakawan']);
        Role::create(['name' => 'mahasiswa']);

        User::create([
            'npm' => 001,
            'username' => 'pustakawan',
            'first_name' => 'pustakawan',
            'last_name' => 'unsur',
            'email' => 'pustakawan@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('pustakawan');

        User::create([
            'npm' => 002,
            'username' => 'mahasiswasatu',
            'first_name' => 'mahasiswa',
            'last_name' => 'unsur',
            'email' => 'mhs1@gmail.com',
            'password' => Hash::make('password'),
        ])->assignRole('mahasiswa');
    }
}
