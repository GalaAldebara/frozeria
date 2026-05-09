<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'name'        => 'Nugget Ayam Fiesta',
                'lokasi'         => 'FRZ001',
                'stok'        => 50,
                'harga'       => 45000,
                'harga_beli'  => 40000,
                'foto'        => null,
                'deskripsi'   => 'Nugget ayam crispy siap saji',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'name'        => 'Sosis Kanzler',
                'lokasi'         => 'FRZ002',
                'stok'        => 15,
                'harga'       => 35000,
                'harga_beli'  => 15000,
                'foto'        => null,
                'deskripsi'   => 'Sosis premium frozen food',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'name'        => 'Kentang Goreng',
                'lokasi'         => 'FRZ003',
                'stok'        => 0,
                'harga'       => 28000,
                'harga_beli'  => 25000,
                'foto'        => null,
                'deskripsi'   => 'Kentang frozen siap goreng',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 3,
                'satuan_id'   => 2,
                'user_id'     => 1,
                'name'        => 'Udang Beku',
                'lokasi'         => 'FRZ004',
                'stok'        => 25,
                'harga'       => 78000,
                'harga_beli'  => 50000,
                'foto'        => null,
                'deskripsi'   => 'Udang segar beku',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'name'        => 'Dimsum Ayam',
                'lokasi'         => 'FRZ005',
                'stok'        => 12,
                'harga'       => 32000,
                'harga_beli'  => 5000,
                'foto'        => null,
                'deskripsi'   => 'Dimsum ayam frozen',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

        ];

        DB::table('items')->insert($data);
    }
}