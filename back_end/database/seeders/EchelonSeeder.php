<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Import the DB facade
use Illuminate\Support\Facades\Schema; // Import the Schema facade if needed for dropping or creating tables


class EchelonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('echelons')->insert([
            ['eselon' => 'I', 'created_at' => now(), 'updated_at' => now()],
            ['eselon' => 'II', 'created_at' => now(), 'updated_at' => now()],
            ['eselon' => 'III', 'created_at' => now(), 'updated_at' => now()],
            ['eselon' => 'IV', 'created_at' => now(), 'updated_at' => now()],
            ['eselon' => 'V', 'created_at' => now(), 'updated_at' => now()],

        ]);
    }
}
