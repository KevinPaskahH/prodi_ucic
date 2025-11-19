<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('units')->insert([
            ['id' => 1, 'level_id' => 1, 'name' => 'Univ', 'slug' => Str::slug('Univ'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'level_id' => 2, 'name' => 'FTI', 'slug' => Str::slug('FTI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'level_id' => 2, 'name' => 'FEB', 'slug' => Str::slug('FEB'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'level_id' => 2, 'name' => 'FPS', 'slug' => Str::slug('FPS'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'level_id' => 3, 'name' => 'TI', 'slug' => Str::slug('TI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'level_id' => 3, 'name' => 'SI', 'slug' => Str::slug('SI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'level_id' => 3, 'name' => 'DKV', 'slug' => Str::slug('DKV'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'level_id' => 3, 'name' => 'MI', 'slug' => Str::slug('MI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'level_id' => 3, 'name' => 'MB', 'slug' => Str::slug('MB'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'level_id' => 3, 'name' => 'AKUN', 'slug' => Str::slug('AKUN'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'level_id' => 3, 'name' => 'MNJ', 'slug' => Str::slug('MNJ'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'level_id' => 3, 'name' => 'BISDI', 'slug' => Str::slug('BISDI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'level_id' => 3, 'name' => 'PKOR', 'slug' => Str::slug('PKOR'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'level_id' => 4, 'name' => 'HIMATIF', 'slug' => Str::slug('HIMATIF'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 15, 'level_id' => 4, 'name' => 'HIMASI', 'slug' => Str::slug('HIMASI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 16, 'level_id' => 4, 'name' => 'HIMADKV', 'slug' => Str::slug('HIMADKV'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 17, 'level_id' => 4, 'name' => 'HIMAMI', 'slug' => Str::slug('HIMAMI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 18, 'level_id' => 4, 'name' => 'HIMAMB', 'slug' => Str::slug('HIMAMB'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 19, 'level_id' => 4, 'name' => 'HIMAKU', 'slug' => Str::slug('HIMAKU'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 20, 'level_id' => 4, 'name' => 'HIMAMNJ', 'slug' => Str::slug('HIMAMNJ'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 21, 'level_id' => 4, 'name' => 'HIMABISDI', 'slug' => Str::slug('HIMABISDI'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 22, 'level_id' => 4, 'name' => 'HIMAPKOR', 'slug' => Str::slug('HIMAPKOR'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 23, 'level_id' => 4, 'name' => 'UKM Musik', 'slug' => Str::slug('UKM Musik'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 24, 'level_id' => 4, 'name' => 'UKM Olahraga', 'slug' => Str::slug('UKM Olahraga'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 25, 'level_id' => 4, 'name' => 'UKM IPTEK', 'slug' => Str::slug('UKM IPTEK'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 26, 'level_id' => 4, 'name' => 'UKM Arthography', 'slug' => Str::slug('UKM Arthography'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 27, 'level_id' => 4, 'name' => 'UKM Esport', 'slug' => Str::slug('UKM Esport'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 28, 'level_id' => 4, 'name' => 'UKM Impala', 'slug' => Str::slug('UKM Impala'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 29, 'level_id' => 4, 'name' => 'UKM Retotik', 'slug' => Str::slug('UKM Retotik'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 30, 'level_id' => 4, 'name' => 'UKM Nusantari', 'slug' => Str::slug('UKM Nusantari'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 31, 'level_id' => 4, 'name' => 'BKM', 'slug' => Str::slug('BKM'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 32, 'level_id' => 4, 'name' => 'Alumni', 'slug' => Str::slug('Alumni'), 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
