<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Barang</title>
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
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">History Barang</h1>
                <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300">
                    Filter
                </button>
            </div>

            <!-- Pencarian -->
            <input type="text" placeholder="Cari barangmu disini ..." class="mb-4 p-2 w-full border rounded">

            <!-- Tabel -->
            <div class="bg-white shadow-md rounded">
                <table class="w-full border-collapse text-left">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="p-3 border">NO</th>
                            <th class="p-3 border">NAMA BARANG</th>
                            <th class="p-3 border">WAKTU</th>
                            <th class="p-3 border">PENEMU</th>
                            <th class="p-3 border">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barangs as $index => $barang)
                        <tr class="hover:bg-gray-100">
                            <td class="p-3 border">{{ $index + 1 }}</td>
                            <td class="p-3 border">{{ $barang->nama_barang }}</td>
                            <td class="p-3 border">{{ $barang->waktu_ditemukan }}</td>
                            <td class="p-3 border">{{ $barang->penemu }}</td>
                            <td class="p-3 border">
                                <a href="{{ route('mahasiswa.histori-barang') }}" class="text-blue-500 hover:underline">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
