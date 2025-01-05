<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Temuan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    @include('components.navbar')

    <div class="flex">
        <!-- Sidebar -->
        <livewire:sidebar />

        <!-- Konten Utama -->
        <div class="p-6 w-full">
            <!-- Container dengan latar belakang putih -->
            <h1 class="text-2xl font-bold mb-6">BARANG TEMUAN</h1>
            <div class="bg-white rounded-lg shadow p-6 overflow-y-auto" style="max-height: 85vh;">
                <!-- Judul Halaman -->

                <!-- Daftar Barang Temuan -->
                @if ($barangs->isEmpty())
                    <p class="text-center text-gray-500">Tidak ada barang temuan untuk ditampilkan.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Card Barang -->
                        @foreach ($barangs as $barang)
                        <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                            <!-- Gambar Barang -->
                            <div class="w-full h-40 bg-gray-100 flex items-center justify-center rounded-t-lg overflow-hidden">
                                @if ($barang->gambar) <!-- Pastikan kolom foto tersedia -->
                                    <img src="{{ asset('foto_laporan/' . $barang->gambar) }}" alt="Foto Barang" class="object-cover w-full h-full">
                                @else
                                    <span class="text-gray-500">Foto tidak tersedia</span>
                                @endif
                            </div>

                            <!-- Detail Barang -->
                            <div class="p-4">
                                <h2 class="text-lg font-semibold mb-2">{{ $barang->nama_barang }}</h2>
                                <p class="text-sm text-gray-600 mb-1"><strong>Waktu:</strong> {{ $barang->waktu_ditemukan }}</p>
                                <p class="text-sm text-gray-600 mb-1"><strong>Penemu:</strong> {{ $barang->penemu }}</p>
                                <p class="text-sm text-gray-600 mb-1"><strong>Lokasi:</strong> {{ $barang->lokasi_ditemukan }}</p>
                                <p class="text-sm text-gray-600 mb-3"><strong>Deskripsi:</strong> {{ $barang->deskripsi }}</p>
                                <a href="{{ route('mahasiswa.detail-barang', $barang->id) }}" class="block text-center px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Detail Barang</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    @livewireScripts
</body>
</html>

