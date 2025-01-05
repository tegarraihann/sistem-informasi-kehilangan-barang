<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangTemuan;


class HistoriBarangController extends Controller
{
    public function index()
    {
        // Ambil data barang temuan dari database
        $barangs = BarangTemuan::all();

        // Kirim data ke view
        return view('histori-barang', compact('barangs'));
    }
}
