<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histori Barang</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    @include('components.navbar')

    <div class="flex">
        <!-- Sidebar -->
        <livewire:sidebar />

        <!-- Konten Utama -->
        <div class="p-6 w-full">
            <h1 class="text-2xl font-bold mb-6">Histori Barang</h1>

            <!-- Tabel Histori Barang -->
            <div class="bg-white shadow-md rounded p-6">
                <table class="table-auto w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama Barang</th>
                            <th class="border px-4 py-2">Waktu Ditemukan</th>
                            <th class="border px-4 py-2">Penemu</th>
                            <th class="border px-4 py-2">Nama Mahasiswa</th>
                            <th class="border px-4 py-2">Tanggal Klaim</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($barangs as $index => $barang)
                        <tr>
                            <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($barang->waktu_ditemukan)->format('d M Y, H:i') }}</td>
                            <td class="border px-4 py-2">{{ $barang->penemu }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama_mahasiswa }}</td>
                            <td class="border px-4 py-2 text-center">{{ \Carbon\Carbon::parse($barang->created_at)->format('d M Y, H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center text-gray-500">Tidak ada histori barang.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
