<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; 

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('groups')->insert([
            ['golongan' => 'IV/e', 'echelon_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'IV/d', 'echelon_id' => '1', 'created_at' => now(), 'updated_at' => now()],
            
            ['golongan' => 'IV/d', 'echelon_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'IV/c', 'echelon_id' => '2', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'IV/b', 'echelon_id' => '2', 'created_at' => now(), 'updated_at' => now()],

            ['golongan' => 'IV/b', 'echelon_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'IV/a', 'echelon_id' => '3', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'III/d', 'echelon_id' => '3', 'created_at' => now(), 'updated_at' => now()],

            ['golongan' => 'III/d', 'echelon_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'III/c', 'echelon_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'III/b', 'echelon_id' => '4', 'created_at' => now(), 'updated_at' => now()],
            
            ['golongan' => 'III/b', 'echelon_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            ['golongan' => 'III/a', 'echelon_id' => '5', 'created_at' => now(), 'updated_at' => now()],
            
        ]);
    }
}
