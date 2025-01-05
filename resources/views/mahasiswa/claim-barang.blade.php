<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Barang</title>
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
            <h1 class="text-2xl font-bold mb-6">CLAIM BARANG</h1>

            <!-- Form Claim -->
            <form id="claimForm" method="POST" action="{{ route('mahasiswa.claim.store', $barang->id) }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" class="w-full border rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">NPM:</label>
                    <input type="text" name="npm" class="w-full border rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Nomor HP:</label>
                    <input type="text" name="no_hp" class="w-full border rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Fakultas:</label>
                    <input type="text" name="fakultas" class="w-full border rounded px-4 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2">Program Studi:</label>
                    <input type="text" name="program_studi" class="w-full border rounded px-4 py-2" required>
                </div>
                <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                    Submit
                </button>
            </form>


        </div>
    </div>
</body>
</html>
