<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
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
            <h1 class="text-2xl font-bold mb-6">Notifikasi dari Admin</h1>

            <!-- Tabel Notifikasi -->
            <div class="bg-white shadow-md rounded p-6">
                <table class="table-auto w-full border border-collapse border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Barang yang Diklaim</th>
                        <th class="border px-4 py-2">Pesan</th>
                        <th class="border px-4 py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notifikasi as $index => $notif)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">
                            {{ $notif->barangTemuan->nama_barang ?? 'Tidak diketahui' }}<br>
                            <small class="text-gray-500">Ditemukan pada: {{ $notif->barangTemuan->waktu_ditemukan ?? '-' }}</small>
                        </td>
                        <td class="border px-4 py-2 text-center">{{ $notif->pesan }}</td>
                        <td class="border px-4 py-2 text-center">{{ $notif->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-2 text-center text-gray-500">Tidak ada notifikasi.</td>
                    </tr>
                    @endforelse
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
