<header>
    <nav class="bg-gray-800 text-white p-4 flex justify-between items-center fixed top-0 left-0 w-full z-40">
        <div class="flex flex-row items-center">
            <button class="text-white text-2xl focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
            <a href="{{ route('akun-admin') }}" class="ml-4">Halo, {{ session('nama_pengguna') }}</a>
        </div>
        <!-- Switch Theme Container -->
        <div class="switch-container">
            @include('switch-theme')
        </div>
    </nav>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const burgerButton = document.querySelector('nav button');

        burgerButton.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
            sidebar.classList.toggle('translate-x-0');
        });
    });
</script>
