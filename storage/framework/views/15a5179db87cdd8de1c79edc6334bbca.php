<nav class="navbar bg-base-100 py-0">
    <div class="container mx-auto px-4 flex justify-between">
        <div class="navbar-start">
            <a class="btn btn-ghost normal-case text-xl" href="#">SMK Swadhipa 2 Natar</a>
        </div>
        <div class="navbar-end flex justify-end">
            <!-- Mobile Dropdown -->
            <div class="dropdown md:hidden">
                <label tabindex="0" class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="dropdown-content menu menu-compact shadow bg-base-100 rounded-box w-52">
                    <li><a href="<?php echo e(route('index')); ?>">Beranda</a></li>
                    <li><a href="<?php echo e(route('data-alumni')); ?>">Data Alumni</a></li>
                    <li><a href="<?php echo e(route('statistik-data-alumni')); ?>">Statistik</a></li>
                    <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                </ul>
            </div>

            <!-- Desktop Menu -->
            <ul class="hidden md:flex md:menu md:menu-horizontal space-x-4">
                <li><a href="<?php echo e(route('index')); ?>" class="btn btn-ghost">Beranda</a></li>
                <li><a href="<?php echo e(route('data-alumni')); ?>" class="btn btn-ghost">Data Alumni</a></li>
                <li><a href="<?php echo e(route('statistik-data-alumni')); ?>" class="btn btn-ghost">Statistik</a></li>
                <li><a href="<?php echo e(route('login')); ?>" class="btn btn-ghost">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/navbar.blade.php ENDPATH**/ ?>