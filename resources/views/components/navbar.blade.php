<div class="bg-green-700 text-white p-4 flex justify-between items-center">
    <!-- Logo SVG -->
    <div>
        <img src="{{ asset('assets/LOGO.svg') }}" alt="Logo" class="h-10 w-200">
    </div>

    <!-- Profil Pengguna -->
    <div class="relative cursor-pointer">
        <!-- Icon Profile -->
        <button id="profileDropdownButton" class="flex items-center focus:outline-none">
            <i class="fas fa-user-circle text-2xl"></i> <!-- Ikon Font Awesome -->
            <span class="ml-2 font-semibold">Profile</span>
            <i class="fas fa-chevron-down ml-1"></i>
        </button>

        <!-- Dropdown Menu -->
        <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg hidden">
            <ul class="py-2">
                @if(auth()->user()->role === 'admin')
                    <li>
                        <a href="{{ route('admin.profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-user"></i> View Profile
                        </a>
                    </li>
                @elseif(auth()->user()->role === 'mahasiswa')
                    <li>
                        <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-user"></i> View Profile
                        </a>
                    </li>
                @elseif(auth()->user()->role === 'adminlapangan')
                    <li>
                        <a href="{{ route('security.profile') }}" class="block px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-user"></i> View Profile
                        </a>
                    </li>
                @endif
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    const profileButton = document.getElementById('profileDropdownButton');
    const profileDropdown = document.getElementById('profileDropdown');

    profileButton.addEventListener('click', (e) => {
        e.stopPropagation();
        profileDropdown.classList.toggle('hidden');
    });

    // Tutup dropdown jika klik di luar
    window.addEventListener('click', () => {
        profileDropdown.classList.add('hidden');
    });
</script>

