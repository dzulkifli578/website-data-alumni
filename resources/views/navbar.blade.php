<header>
    <nav class="navbar bg-base-100 py-0 mb-4 border-b border-base-content">
        <div class="container mx-auto flex justify-between items-center px-4">
            <!-- Navbar Start (Brand) -->
            <div class="navbar-start flex flex-row items-center">
                <img src="{{ asset('img/swadhipa.png') }}" alt="Swadhipa" class="w-auto h-10">
                <button onclick="window.location.href='{{ route('index') }}'"
                    class="btn btn-ghost sm:text-lg md:text-xl lg:text-2xl">
                    SMK Swadhipa 2 Natar
                </button>
            </div>

            <!-- Navbar End (Menu + Theme Switch) -->
            <div class="navbar-end flex items-center space-x-4">
                <!-- Mobile Dropdown Menu -->
                <div class="dropdown md:hidden relative">
                    <label tabindex="0" class="btn btn-ghost" onclick="toggleDropdown()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </label>
                    <ul id="mobile-menu"
                        class="dropdown-content menu menu-compact bg-base-100 shadow rounded-box w-52 mt-2 hidden absolute right-0 top-full z-50">
                        <li><a href="{{ route('index') }}">Beranda</a></li>
                        <li><a href="{{ route('data-alumni') }}">Data Alumni</a></li>
                        <li><a href="{{ route('statistik-data-alumni') }}">Statistik</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </div>

                <!-- Switch Theme (Responsive for both Mobile & Desktop) -->
                <div class="flex items-center justify-center">
                    @include('switch-theme')
                </div>

                <!-- Desktop Menu -->
                <ul class="hidden md:flex md:space-x-4">
                    <li><a href="{{ route('index') }}" class="btn btn-ghost">Beranda</a></li>
                    <li><a href="{{ route('data-alumni') }}" class="btn btn-ghost">Data Alumni</a></li>
                    <li><a href="{{ route('statistik-data-alumni') }}" class="btn btn-ghost">Statistik</a></li>
                    <li><a href="{{ route('login') }}" class="btn btn-ghost">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function toggleDropdown() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
