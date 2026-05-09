<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'PCS', 'nama' => 'Pcs'],
            ['kode' => 'KG',  'nama' => 'Kilogram'],
            ['kode' => 'L',   'nama' => 'Liter'],
            ['kode' => 'BOX', 'nama' => 'Box'],
            ['kode' => 'M',   'nama' => 'Meter'],
        ];

        DB::table('satuan')->insert($data);
    }
}