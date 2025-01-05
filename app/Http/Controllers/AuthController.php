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

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Redirect ke dashboard berdasarkan middleware
                return redirect()->intended('/dashboard');
            }

            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ])->onlyInput('email');
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
            // Log input data
            \Log::info('Input Data:', $request->all());

            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|max:255|confirmed',
            ]);

            try {
                // Simpan data ke database
                $user = User::create([
                    'name' => $validated['name'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']), // Hash password di sini
                    'role' => 'mahasiswa', // Default role
                ]);

                // Log user data setelah berhasil
                \Log::info('User Created:', $user->toArray());

                return redirect('/dashboard')->with('success', 'Registrasi berhasil!');
            } catch (\Exception $e) {
                // Log error jika terjadi masalah
                \Log::error('Error Registering User:', ['error' => $e->getMessage()]);

                return back()->withErrors('Terjadi kesalahan saat menyimpan data.');
            }
        }

}


