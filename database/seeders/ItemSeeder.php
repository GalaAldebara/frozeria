<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'AYM-PCS-001',
                'name'        => 'Nugget Ayam Fiesta',
                'lokasi'      => 'FRZ001',
                'stok'        => 50,
                'harga'       => 45000,
                'harga_beli'  => 40000,
                'foto'        => 'items/nugget.jpg',
                'deskripsi'   => 'Nugget ayam crispy siap saji',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'AYM-PCS-002',
                'name'        => 'Sosis Kanzler',
                'lokasi'      => 'FRZ002',
                'stok'        => 15,
                'harga'       => 35000,
                'harga_beli'  => 15000,
                'foto'        => 'items/sosis.jpg',
                'deskripsi'   => 'Sosis premium frozen food',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'FSN-PCS-001',
                'name'        => 'Kentang Goreng',
                'lokasi'      => 'FRZ003',
                'stok'        => 0,
                'harga'       => 28000,
                'harga_beli'  => 25000,
                'foto'        => 'items/kentang.jpg',
                'deskripsi'   => 'Kentang frozen siap goreng',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 3,
                'satuan_id'   => 2,
                'user_id'     => 1,
                'kode_item'   => 'SEA-KG-001',
                'name'        => 'Udang Beku',
                'lokasi'      => 'FRZ004',
                'stok'        => 25,
                'harga'       => 78000,
                'harga_beli'  => 50000,
                'foto'        => 'items/udang.jpg',
                'deskripsi'   => 'Udang segar beku',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'FSN-PCS-002',
                'name'        => 'Dimsum Ayam',
                'lokasi'      => 'FRZ005',
                'stok'        => 12,
                'harga'       => 32000,
                'harga_beli'  => 5000,
                'foto'        => 'items/dimsum.jpg',
                'deskripsi'   => 'Dimsum ayam frozen',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ITEM 6
            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'FSN-PCS-003',
                'name'        => 'Tempura Udang',
                'lokasi'      => 'FRZ006',
                'stok'        => 18,
                'harga'       => 39000,
                'harga_beli'  => 30000,
                'foto'        => 'items/tempura.jpg',
                'deskripsi'   => 'Tempura udang frozen',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ITEM 7
            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'AYM-PCS-003',
                'name'        => 'Chicken Karage',
                'lokasi'      => 'FRZ007',
                'stok'        => 20,
                'harga'       => 42000,
                'harga_beli'  => 35000,
                'foto'        => null,
                'deskripsi'   => 'Chicken karage crispy',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ITEM 8
            [
                'kategori_id' => 3,
                'satuan_id'   => 2,
                'user_id'     => 1,
                'kode_item'   => 'SEA-KG-002',
                'name'        => 'Cumi Beku',
                'lokasi'      => 'FRZ008',
                'stok'        => 8,
                'harga'       => 65000,
                'harga_beli'  => 50000,
                'foto'        => null,
                'deskripsi'   => 'Cumi segar frozen',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ITEM 9
            [
                'kategori_id' => 2,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'FSN-PCS-004',
                'name'        => 'Cireng Frozen',
                'lokasi'      => 'FRZ009',
                'stok'        => 30,
                'harga'       => 22000,
                'harga_beli'  => 17000,
                'foto'        => 'items/cireng.jpeg',
                'deskripsi'   => 'Cireng isi frozen',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

            // ITEM 10
            [
                'kategori_id' => 1,
                'satuan_id'   => 1,
                'user_id'     => 1,
                'kode_item'   => 'AYM-PCS-004',
                'name'        => 'Ayam Crispy Frozen',
                'lokasi'      => 'FRZ010',
                'stok'        => 5,
                'harga'       => 55000,
                'harga_beli'  => 45000,
                'foto'        => null,
                'deskripsi'   => 'Ayam crispy siap goreng',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],

        ];

        DB::table('items')->insert($data);
    }
}