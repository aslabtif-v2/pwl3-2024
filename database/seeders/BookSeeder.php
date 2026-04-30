<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Pemrograman Laravel',
                'author' => 'Lalan Jaelani, S.T,.M.T',
                'year' => 2026,
                'publisher' => 'Informatika Press',
                'city' => 'Cianjur',
                'bookshelf_id' => 1,
            ]
        ]);
    }
}
