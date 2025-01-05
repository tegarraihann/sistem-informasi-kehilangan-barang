<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Periksa apakah email ada di database
        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (!$user) {
            // Jika email tidak ditemukan
            return back()->withErrors([
                'email' => 'Email tidak ditemukan. Silakan periksa kembali.',
            ])->onlyInput('email');
        }

        // Jika email ditemukan, coba periksa password
        if (!\Illuminate\Support\Facades\Hash::check($credentials['password'], $user->password)) {
            // Jika password tidak cocok
            return back()->withErrors([
                'password' => 'Password salah. Silakan coba lagi.',
            ])->onlyInput('email');
        }

        // Jika email dan password cocok, lakukan autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan role pengguna
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            } elseif (Auth::user()->role === 'adminlapangan') {
                return redirect()->route('security-lapangan.dashboard');
            }

            return redirect()->route('unauthorized');
        }

        // Jika gagal karena alasan lain
        return back()->withErrors([
            'email' => 'Terjadi kesalahan. Silakan coba lagi.',
        ]);
    }


    public function logout(Request $request)
        {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('success', 'Anda telah logout.');
        }

        // Tampilkan halaman register
        public function showRegisterForm()
        {
            return view('auth.register');
        }

        public function register(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:3|confirmed',
            ]);

            try {
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                    'role' => 'mahasiswa',
                ]);

                \Log::info('User Created:', $user->toArray());
                return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
            } catch (\Exception $e) {
                \Log::error('Error Registering User:', ['error' => $e->getMessage()]);
                return back()->withErrors('Terjadi kesalahan saat menyimpan data.');
            }
        }
}


