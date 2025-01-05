<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\BarangTemuan;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function LaporanClaim()
    {
        // Ambil data dari tabel claims
        $claims = Claim::paginate(10); // Sesuaikan jumlah data per halaman

        // Kirim data ke view
        return view('admin.laporan-claim', compact('claims'));
    }

    public function LaporanClaimDetail($id)
    {
        $claim = Claim::findOrFail($id); // Ambil data klaim berdasarkan ID
        return view('admin.laporan-claim-detail', compact('claim')); // Tampilkan halaman detail
    }

    public function approve($id)
    {
        try {
            // Ambil data klaim berdasarkan ID
            $claim = Claim::findOrFail($id);

            // Pastikan status klaim adalah "Menunggu Persetujuan"
            if ($claim->status !== 'Menunggu Persetujuan') {
                return redirect()->back()->with('error', 'Klaim tidak dapat diapprove.');
            }

            // Ambil data barang temuan terkait klaim
            $barang = $claim->barangTemuan;

            if (!$barang) {
                return redirect()->back()->with('error', 'Barang tidak ditemukan terkait klaim ini.');
            }

            // Update status klaim menjadi "Disetujui"
            $claim->update(['status' => 'Disetujui']);

            // Masukkan data ke tabel histori barang
            \DB::table('histori_barangs')->insert([
                'nama_barang' => $barang->nama_barang,
                'waktu_ditemukan' => $barang->waktu_ditemukan,
                'penemu' => $barang->penemu,
                'klaim_id' => $claim->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return redirect()->route('admin.histori-barang')
                ->with('success', 'Klaim berhasil diapprove dan barang dipindahkan ke histori.');
        } catch (\Exception $e) {
            \Log::error('Error saat menyetujui klaim:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyetujui klaim.');
        }
    }


    public function destroy($id)
    {
        try {
            $claim = Claim::findOrFail($id);
            $claim->delete();

            return redirect()->back()->with('success', 'Klaim berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Error saat menghapus klaim: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus klaim.');
        }
    }

    public function reject($id)
    {
        try {
            $claim = Claim::findOrFail($id);

            // Update status klaim menjadi Ditolak
            $claim->update(['status' => 'Ditolak']);

            return redirect()->back()->with('success', 'Klaim berhasil ditolak.');
        } catch (\Exception $e) {
            \Log::error('Error rejecting claim: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menolak klaim.');
        }
    }

    public function HistoriBarang()
    {
        $barangs = \DB::table('histori_barangs')
            ->join('claims', 'histori_barangs.klaim_id', '=', 'claims.id')
            ->select(
                'histori_barangs.nama_barang',
                'histori_barangs.waktu_ditemukan',
                'histori_barangs.penemu',
                'claims.nama_lengkap as nama_mahasiswa',
                'histori_barangs.created_at'
            )
            ->orderBy('histori_barangs.created_at', 'desc')
            ->get();

        return view('admin.histori-barang', compact('barangs'));
    }


    public function kirimPesan(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required|string|max:500',
        ]);

        try {
            $claim = Claim::findOrFail($id);

            // Update pesan dan status klaim
            $claim->update([
                'pesan' => $request->pesan,
                'status' => 'Menunggu Persetujuan', // Status sementara sebelum disetujui
            ]);

            return redirect()->route('laporan-claim.detail', $id)
                ->with('success', 'Pesan berhasil dikirim. Silakan approve klaim.');
        } catch (\Exception $e) {
            \Log::error('Error kirim pesan: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan.');
        }
    }

}
