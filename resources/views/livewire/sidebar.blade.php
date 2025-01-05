<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<div class="h-screen flex flex-col bg-gray-100 shadow-md w-64">
    @php
        $user = Auth::user();
        $currentRoute = Route::currentRouteName(); // Mendapatkan nama route saat ini
    @endphp

    <!-- Sidebar Header -->
    <div class="p-4 bg-green-700 text-white flex flex-col items-center">
        <div class="rounded-full bg-white w-16 h-16 flex items-center justify-center mb-2">
            <i class="fas fa-user-circle text-green-700 text-4xl"></i>
        </div>
        <div class="text-center">
            <span class="block font-bold text-lg">{{ $user->name }}</span>
            <span class="text-sm">{{ ucfirst($user->role) }}</span>
        </div>
    </div>

    <!-- Menu Sidebar -->
    <nav class="mt-4 flex-grow">
        <ul class="space-y-1">
            <!-- Menu Khusus Admin -->
            @if ($user->role === 'admin')
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'admin.dashboard' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-chart-bar mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.laporan-claim') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'admin.laporan-claim' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-file-alt mr-2"></i> Laporan Claim
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.histori-barang') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'admin.histori-barang' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-history mr-2"></i> Histori Barang
                    </a>
                </li>
            @endif

            <!-- Menu Khusus Security Lapangan -->
            @if ($user->role === 'adminlapangan')
                <li>
                    <a href="{{ route('security-lapangan.dashboard') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'security-lapangan.dashboard' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('security-lapangan.buat-laporan') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'security-lapangan.buat-laporan' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-edit mr-2"></i> Buat Laporan
                    </a>
                </li>
                <li>
                    <a href="{{ route('security-lapangan.barang-temuan') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'security-lapangan.barang-temuan' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-box-open mr-2"></i> Barang Temuan
                    </a>
                </li>
            @endif

            <!-- Menu Khusus Mahasiswa -->
            @if ($user->role === 'mahasiswa')
                <li>
                    <a href="{{ route('mahasiswa.dashboard') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'mahasiswa.dashboard' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-home mr-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.barang-temuan') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'mahasiswa.barang-temuan' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-search mr-2"></i> Barang Temuan
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.histori-barang') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'mahasiswa.histori-barang' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-check-circle mr-2"></i> Histori Barang
                    </a>
                </li>
                <li>
                    <a href="{{ route('mahasiswa.notifikasi') }}"
                       class="block px-4 py-3 rounded-l-full {{ $currentRoute === 'mahasiswa.notifikasi' ? 'bg-green-600 text-white' : 'hover:bg-green-500 hover:text-white' }}">
                        <i class="fas fa-bell mr-2"></i> Notifikasi
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t bg-gray-100">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center gap-2 px-4 py-3 rounded-l-full text-red-500 hover:bg-red-100">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
</div>
