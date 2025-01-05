<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Laporan Claim</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
            <h1 class="text-2xl font-bold mb-6">Detail Laporan Claim</h1>

            <!-- Informasi Detail -->
            <div class="bg-white shadow-md rounded p-6">
                <p><strong>Nama Lengkap:</strong> {{ $claim->nama_lengkap }}</p>
                <p><strong>NPM:</strong> {{ $claim->npm }}</p>
                <p><strong>Nomor HP:</strong> {{ $claim->no_hp }}</p>
                <p><strong>Fakultas:</strong> {{ $claim->fakultas }}</p>
                <p><strong>Program Studi:</strong> {{ $claim->program_studi }}</p>
                <p><strong>Status:</strong> {{ $claim->status }}</p>

                <!-- Tombol -->
                <div class="flex gap-4 mt-6">
                    @if ($claim->status === 'Menunggu')
                        <button onclick="openModal()" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                            Tindak Lanjut
                        </button>
                    @elseif ($claim->status === 'Menunggu Persetujuan')
                        <form method="POST" action="{{ route('laporan-claim.approve', $claim->id) }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Approve
                            </button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('laporan-claim.reject', $claim->id) }}">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                            Reject
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalTindakLanjut" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white p-6 rounded shadow-lg w-1/3">
                <h2 class="text-lg font-bold mb-4">Pesan untuk Mahasiswa</h2>
                <form method="POST" action="{{ route('laporan-claim.kirim-pesan', $claim->id) }}">
                    @csrf
                    <textarea name="pesan" class="w-full border border-gray-300 rounded p-2" rows="4" placeholder="Masukkan pesan untuk mahasiswa"></textarea>
                    <div class="mt-4 flex justify-end">
                        <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById('modalTindakLanjut').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalTindakLanjut').classList.add('hidden');
        }
    </script>
</body>
</html>
