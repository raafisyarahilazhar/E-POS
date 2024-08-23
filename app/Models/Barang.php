<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'suppliers_id', 'nama_barang', 'kategori_barang', 'harga_barang', 'stok_barang', 'satuan'
    ];

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }

    public function barangkeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id', 'barangs_id');
    }

    public function barangmasuk() {
        return $this->hasMany(BarangMasuk::class, 'id', 'barangs_id');
    }

}
