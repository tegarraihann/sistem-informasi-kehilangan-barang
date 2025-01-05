<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <h1 class="text-2xl font-bold mb-6">Buat Laporan</h1>

            <!-- Form Laporan -->
            <form method="POST" action="{{ route('security-lapangan.buat-laporan-store') }}" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
                @csrf
                <!-- Nama Barang -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-bold mb-2">Nama Barang:</label>
                        <input type="text" name="nama_barang" class="w-full border rounded px-4 py-2" placeholder="Cari barangmu disini..." required>
                    </div>

                    <!-- Waktu Ditemukan -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Waktu Ditemukan:</label>
                        <input type="datetime-local" name="waktu_ditemukan" class="w-full border rounded px-4 py-2" required>
                    </div>

                    <!-- Penemu -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Pelapor:</label>
                        <input type="text" name="penemu" class="w-full border rounded px-4 py-2" placeholder="Cari barangmu disini..." required>
                    </div>

                    <!-- Lokasi Ditemukan -->
                    <div>
                        <label class="block text-sm font-bold mb-2">Lokasi Ditemukan:</label>
                        <input type="text" name="lokasi_ditemukan" class="w-full border rounded px-4 py-2" placeholder="Cari barangmu disini..." required>
                    </div>
                </div>

                <!-- Upload Foto -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Upload Foto:</label>
                    <input type="file" name="foto" class="w-full border rounded px-4 py-2">
                </div>

                <!-- Deskripsi -->
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Deskripsi:</label>
                    <textarea name="deskripsi" rows="5" class="w-full border rounded px-4 py-2" placeholder="Masukkan deskripsi barang..." required></textarea>
                </div>

                <!-- Tombol Submit -->
                <div class="text-left">
                    <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire('SweetAlert Loaded');
        </script>
    @endif
</body>
</html>
