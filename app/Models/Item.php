<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'satuan_id',
        'user_id',
        'name',
        'stok',
        'harga',
        'harga_beli',
        'foto',
        'lokasi',
        'deskripsi'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class);
    }

    public function stokBarang()
    {
        return $this->hasMany(StokBarang::class);
    }
}
