<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pelaporan Barang Hilang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .login-background {
            background-image: url('{{ asset('assets/background.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }

        .login-background::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .login-container {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body class="login-background flex justify-center items-center">
    <div class="login-container bg-white p-6 rounded-lg shadow-lg w-96">
        <!-- Logo di tengah -->
        <div class="flex justify-center mb-4">
            <img src="{{ asset('assets/logo-sikerang.png') }}" alt="Logo" class="h-16 w-auto">
        </div>

        <!-- Tampilkan Pesan Error -->
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded" required>
            </div>
            <button type="submit" class="w-full bg-green-500 text-white py-2 rounded hover:bg-green-600">
                Login
            </button>
        </form>

        <!-- Link ke Register -->
        <div class="text-center mt-4">
            <a href="{{ route('register') }}" class="text-green-500 hover:underline">
                Don't have an account? Register here.
            </a>
        </div>
    </div>
</body>
</html>
