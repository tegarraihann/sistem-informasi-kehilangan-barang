<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangTemuan;


class BarangTemuanController extends Controller
{


    public function show($id)
    {
        // Ambil data barang berdasarkan ID
        $barang = BarangTemuan::findOrFail($id);

        // Kirim data ke view
        return view('detail-barang', compact('barang'));
    }

    
}
