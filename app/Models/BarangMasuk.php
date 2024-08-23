<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangs_id', 'jumlah_barang', 'satuan'
    ];

    public function barang() {
        return $this->belongsTo(Barang::class, 'barangs_id', 'id');
    }
}   
