<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BarangTemuan extends Model
{
    use HasFactory;

    protected $table = 'barang_temuans';

    protected $fillable = [
        'nama_barang',
        'waktu_ditemukan',
        'penemu',
        'lokasi_ditemukan',
        'deskripsi',
        'gambar',
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function barangTemuan()
    {
        return $this->belongsTo(BarangTemuan::class, 'barang_temuan_id', 'id');
    }


}
