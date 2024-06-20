<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('religions')->insert([
            ['name' => 'Islam', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kristen Protestan', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kristen Katolik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hindu', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Buddha', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
