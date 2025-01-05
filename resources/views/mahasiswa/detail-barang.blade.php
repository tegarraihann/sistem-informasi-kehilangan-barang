<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    @include('components.navbar')

    <div class="flex">
        <!-- Sidebar -->
        <livewire:sidebar />

        <!-- Konten Utama -->
        <div class="p-6 w-full">
            <!-- Judul Halaman -->
            <h1 class="text-2xl font-bold mb-6">DETAIL BARANG</h1>

            <!-- Kontainer Detail Barang -->
            <div class="bg-white shadow-md rounded p-6 flex">
                <!-- Gambar Barang -->
                <div class="w-1/3 flex items-center justify-center border rounded bg-gray-100">
                    @if ($barang->gambar) <!-- Pastikan kolom foto tersedia -->
                        <img src="{{ asset('foto_laporan/' . $barang->gambar) }}" alt="Foto Barang" class="max-w-full max-h-full">
                    @else
                        <span class="text-gray-500">Foto tidak tersedia</span>
                    @endif
                </div>

                <!-- Detail Barang -->
                <div class="ml-6 w-2/3">
                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Nama Barang:</label>
                        <input type="text" class="w-full border rounded px-4 py-2" value="{{ $barang->nama_barang }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Waktu Ditemukan:</label>
                        <input type="text" class="w-full border rounded px-4 py-2" value="{{ $barang->waktu_ditemukan }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Penemu:</label>
                        <input type="text" class="w-full border rounded px-4 py-2" value="{{ $barang->penemu }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Lokasi Ditemukan:</label>
                        <input type="text" class="w-full border rounded px-4 py-2" value="{{ $barang->lokasi_ditemukan }}" readonly>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-bold mb-2">Deskripsi:</label>
                        <textarea class="w-full border rounded px-4 py-2" rows="4" readonly>{{ $barang->deskripsi }}</textarea>
                    </div>

                    <!-- Tombol Klaim -->
                    <button class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        <a href="{{ route('mahasiswa.claim-barang', $barang->id) }}" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Klaim Barang
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
