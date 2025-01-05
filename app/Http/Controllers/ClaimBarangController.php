<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangTemuan;
use App\Models\Claim;

class ClaimBarangController extends Controller
{
    public function index()
    {
        // Logika untuk menampilkan laporan claim (khusus admin)
        return view('laporan-claim.index');
    }



    public function store(Request $request, $id)
    {
        \Log::info('Data yang diterima:', $request->all());
        \Log::info('Barang Temuan ID:', ['id' => $id]);

        // Validasi input
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'npm' => 'required|string|max:20',
            'no_hp' => 'required|string|max:15',
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
        ]);

        // Simpan data klaim ke database
        try {
            Claim::create([
                'barang_temuan_id' => $id,
                'nama_lengkap' => $validated['nama_lengkap'],
                'npm' => $validated['npm'],
                'no_hp' => $validated['no_hp'],
                'fakultas' => $validated['fakultas'],
                'program_studi' => $validated['program_studi'],
                'status' => 'Menunggu',
            ]);

            return response()->json(['message' => 'Data klaim berhasil disimpan.'], 200);
        } catch (\Exception $e) {
            // Log kesalahan untuk debugging
            \Log::error('Error saat menyimpan klaim: '.$e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data klaim.'], 500);
        }
    }


}
