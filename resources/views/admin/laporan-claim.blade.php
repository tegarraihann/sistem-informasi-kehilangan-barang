<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Claim</title>
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
            <!-- Judul Halaman -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Laporan Claim</h1>
                <button class="px-4 py-2 bg-gray-200 text-gray-600 rounded hover:bg-gray-300 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 5a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1zM4 10a1 1 0 000 2h12a1 1 0 100-2H4zm-3 6a1 1 0 011-1h14a1 1 0 110 2H2a1 1 0 01-1-1z" />
                    </svg>
                    Filter
                </button>
            </div>

            <!-- Tabel Laporan Claim -->
            <div class="bg-white shadow-md rounded">
                <table id="laporan-claim-table" class="min-w-full divide-y divide-gray-200 table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">NO</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">NAMA LENGKAP</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">NPM</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">NO HP</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">PRODI</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">STATUS</th>
                            <th class="p-3 text-left text-sm font-semibold text-gray-700">AKSI</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($claims as $item)
                        <tr>
                            <td class="p-3 text-sm text-gray-800">{{ $loop->iteration }}</td>
                            <td class="p-3 text-sm text-gray-800">{{ $item->nama_lengkap }}</td>
                            <td class="p-3 text-sm text-gray-800">{{ $item->npm }}</td>
                            <td class="p-3 text-sm text-gray-800">{{ $item->no_hp }}</td>
                            <td class="p-3 text-sm text-gray-800">{{ $item->program_studi }}</td>
                            <td class="p-3 text-sm text-gray-800">{{ $item->status }}</td>
                            <td class="p-3 text-sm text-gray-800 flex gap-2">
                                <a href="{{ route('admin.laporan-claim-detail', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2-4H7v10h10V8z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $claims->links() }}
            </div>
        </div>
    </div>
</body>
</html>
