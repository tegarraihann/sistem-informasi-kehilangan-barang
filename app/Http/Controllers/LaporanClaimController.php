<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Claim;
use App\Models\BarangTemuan;


class LaporanClaimController extends Controller
{


    public function approve($id)
    {
        $claim = Claim::findOrFail($id);
        $claim->status = 'Disetujui';
        $claim->save();

        return redirect()->back()->with('success', 'Klaim berhasil disetujui.');
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
            $claim->update(['status' => 'Ditolak']); // Ubah status klaim menjadi "Ditolak"

            return redirect()->route('laporan-claim.index')->with('success', 'Klaim berhasil ditolak.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menolak klaim.');
        }
    }

}
