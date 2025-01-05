<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\BarangTemuan;

class LaporanController extends Controller
{

    public function index()
    {
        // Return a view or response for the "buat-laporan" page
        return view('security_lapangan.buat_laporan');
    }

    public function create()
    {
        // Logika untuk menampilkan halaman form buat laporan
        return view('admin_lapangan.buat-laporan'); // Sesuaikan dengan nama view Anda
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data
        $validated = $request->validate([
            'nama_barang' => 'required|string',
            'waktu_ditemukan' => 'required|date',
            'penemu' => 'required|string',
            'lokasi_ditemukan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('uploads', 'public');
        }

        // Simpan data ke database
        BarangTemuan::create($validated);


        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dibuat.');

    }
}
