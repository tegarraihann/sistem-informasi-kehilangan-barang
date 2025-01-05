<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangTemuan;
use Illuminate\Support\Facades\Storage;


class SecurityLapanganController extends Controller
{
    public function index()
    {
        return view('security-lapangan.dashboard');
    }

    public function buatLaporan()
    {
        // Logika untuk menampilkan halaman form buat laporan
        return view('security-lapangan.buat-laporan'); // Sesuaikan dengan nama view Anda
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'waktu_ditemukan' => 'required|date',
            'penemu' => 'required|string|max:255',
            'lokasi_ditemukan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
            'deskripsi' => 'required|string',
        ]);

        // Upload file jika ada
        $filename = null;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_laporan'), $filename);
        }

        // Simpan data ke database
        BarangTemuan::create([
            'nama_barang' => $request->nama_barang,
            'waktu_ditemukan' => $request->waktu_ditemukan,
            'penemu' => $request->penemu,
            'lokasi_ditemukan' => $request->lokasi_ditemukan,
            'gambar' => $filename, // Simpan nama file di database
            'deskripsi' => $request->deskripsi,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('security-lapangan.barang-temuan')->with('success', 'Laporan berhasil dibuat.');
    }

    public function barangTemuan()
    {
        $barangs = barangTemuan::All();

        return view('security-lapangan.barang-temuan', compact('barangs'));
    }

    public function detailBarang($id)
    {
        $barang = BarangTemuan::findOrFail($id);

        return view('security-lapangan.detail-barang', compact('barang'));
    }
}
