<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('levels')->insert([
            ['id' => 1, 'name' => 'Univ', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Fakultas', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Prodi', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Biro', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
