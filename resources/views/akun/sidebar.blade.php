<aside id="sidebar"
    class="bg-gray-800 text-white w-64 fixed top-16 bottom-0 left-0 overflow-y-auto transform -translate-x-full transition-transform duration-300 z-10">
    <div class="p-4">
        <p href="#" class="block text-white text-lg font-semibold py-3 mb-4">SMK Swadhipa 2 Natar</p>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('akun-admin') }}"
                    class="flex items-center p-2 rounded hover:bg-gray-700 {{ Route::currentRouteName() === 'akun-admin' ? 'bg-gray-700' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('profil-akun') }}"
                    class="flex items-center p-2 rounded hover:bg-gray-700 {{ Route::currentRouteName() === 'profil-akun' ? 'bg-gray-700' : '' }}">
                    <i class="nav-icon fas fa-user mr-2"></i>
                    Profil Akun
                </a>
            </li>
            <li>
                <a href="{{ route('admin-data-alumni') }}"
                    class="flex items-center p-2 rounded hover:bg-gray-700 {{ Route::currentRouteName() === 'admin-data-alumni' ? 'bg-gray-700' : '' }}">
                    <i class="nav-icon fas fa-users mr-2"></i>
                    Data Alumni
                </a>
            </li>
            <!-- Menu Chart -->
            <li>
                <a href="{{ route('chart') }}"
                    class="flex items-center p-2 rounded hover:bg-gray-700 {{ Route::currentRouteName() === 'chart' ? 'bg-gray-700' : '' }}">
                    <i class="nav-icon fas fa-chart-bar mr-2"></i>
                    Chart
                </a>
            </li>
            <li>
                <a href="{{ route('logout') }}" class="flex items-center p-2 rounded hover:bg-gray-700">
                    <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</aside>
