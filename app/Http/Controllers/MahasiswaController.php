<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BarangTemuan;
use App\Models\Claim;



class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard');
    }

    public function barangTemuan()
    {
        // Ambil semua data barang temuan
        $barangs = BarangTemuan::all();

        // Kirim data ke view
        return view('mahasiswa.barang-temuan', compact('barangs'));
    }

    public function show($id)
    {
        $barang = BarangTemuan::findOrFail($id);

        return view('mahasiswa.detail-barang', compact('barang'));
    }

    public function create($id)
    {
        // Ambil data barang berdasarkan ID
        $barang = BarangTemuan::findOrFail($id);

        // Kirim data ke view
        return view('mahasiswa.claim-barang', compact('barang'));
    }

    public function showClaimForm($id)
    {
        $barang = BarangTemuan::findOrFail($id);
        return view('claim-barang', compact('barang'));
    }

    public function store(Request $request, $id)
    {

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

            return redirect()->route('mahasiswa.barang-temuan')->with('success', 'Data klaim berhasil disimpan.');
        } catch (\Exception $e) {
            // Log kesalahan untuk debugging
            \Log::error('Error saat menyimpan klaim: '.$e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data klaim.');
        }
    }

    public function HistoriBarang()
    {
        // Ambil data barang temuan dari database
        $barangs = BarangTemuan::all();

        // Kirim data ke view
        return view('mahasiswa.histori-barang', compact('barangs'));
    }

    public function getDataHistori()
    {
        $data = BarangTemuan::select(['id', 'nama_barang', 'waktu_ditemukan', 'penemu']);

        return DataTables::of($data)
            ->addColumn('aksi', function ($row) {
                return '<a href="'.route('barang-temuan.detail', $row->id).'" class="text-blue-500 hover:underline">Detail</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function notifikasi()
    {
        $notifikasi = Claim::with('barangTemuan') // Muat relasi barang temuan
            ->whereNotNull('pesan')
            ->where('nama_lengkap', Auth::user()->name)
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('mahasiswa.notifikasi', compact('notifikasi'));
    }
}


