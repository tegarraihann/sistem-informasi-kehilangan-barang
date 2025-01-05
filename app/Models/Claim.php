<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Gunakan namespace yang benar
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    use HasFactory;

    protected $table = 'claims'; // Sesuaikan dengan nama tabel di database Anda

    protected $fillable = [
        'barang_temuan_id',
        'nama_lengkap',
        'npm',
        'no_hp',
        'fakultas',
        'program_studi',
        'status',
        'pesan',
    ];

    // Relasi ke tabel BarangTemuan
    public function barangTemuan()
    {
        return $this->belongsTo(BarangTemuan::class, 'barang_temuan_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'npm', 'npm'); // Pastikan kolom npm sesuai
    }

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function scopeWithPesan($query)
    {
        return $query->whereNotNull('pesan');
    }
}

