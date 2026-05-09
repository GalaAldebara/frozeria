<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'nama' => 'Ayam',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Frozen Snack',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama' => 'Seafood',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('kategoris')->insert($data);
    }
}