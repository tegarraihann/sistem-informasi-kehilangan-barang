<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('mahasiswa.dashboard'); // Pastikan file 'dashboard.blade.php' ada
    }

    public function adminLapangan()
    {
        return view('dashboard-admin-lapangan');
    }

    public function admin()
    {
        return view('dashboard.admin');
    }
}
