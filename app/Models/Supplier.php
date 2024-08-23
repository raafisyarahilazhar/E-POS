<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supplier', 'no_hp', 'alamat'
    ];

    public function barang() {
        return $this->hasMany(Barang::class, 'suppliers_id');
    }
}
