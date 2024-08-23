<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

    protected $fillable = ['transaksis_id', 'barangs_id', 'jumlah_barang'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barangs_id', 'id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksis_id', 'id');
    }
}
