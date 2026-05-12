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
                'kode' => 'AYM',
                'nama' => 'Ayam',
                'deskripsi' => 'Kategori produk olahan ayam frozen',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode' => 'FSN',
                'nama' => 'Frozen Snack',
                'deskripsi' => 'Kategori snack frozen food',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'kode' => 'SEA',
                'nama' => 'Seafood',
                'deskripsi' => 'Kategori seafood beku',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        DB::table('kategoris')->insert($data);
    }
}