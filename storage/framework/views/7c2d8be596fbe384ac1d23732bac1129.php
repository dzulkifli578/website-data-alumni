<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Hero -->
    <section class="relative bg-cover bg-center text-white py-52"
        style="background-image: url('<?php echo e(asset('img/sekolah.jpg')); ?>');">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <div class="relative z-20 container mx-auto text-center px-4">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Selamat Datang di Web Data Alumni</h1>
            <p class="text-base md:text-lg lg:text-xl mb-6">Hubungkan masa lalu dengan masa depan. Jelajahi dan tetap
                terhubung dengan sesama alumni.</p>
            <a href="<?php echo e(route('data-alumni')); ?>"
                class="btn btn-outline btn-light text-white border-white hover:bg-white hover:text-black py-2 px-4 md:py-3 md:px-6 rounded-full">Lihat
                Semua Alumni</a>
        </div>
    </section>

    <!-- Jurusan -->
    <section class="my-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Jurusan</h2>
            <div class="flex flex-wrap gap-4 justify-center">
                <div onclick="window.location.href='<?php echo e(route('rpl')); ?>'"
                    class="flex flex-col items-center justify-center w-full sm:w-1/2 md:w-1/3 lg:w-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="<?php echo e(asset('img/rpl.svg')); ?>" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Rekayasa Perangkat Lunak</p>
                </div>
                <div onclick="window.location.href='<?php echo e(route('tkj')); ?>'"
                    class="flex flex-col items-center justify-center w-full sm:w-1/2 md:w-1/3 lg:w-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="<?php echo e(asset('img/tkj.svg')); ?>" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Komputer dan Jaringan</p>
                </div>
                <div onclick="window.location.href='<?php echo e(route('titl')); ?>'"
                    class="flex flex-col items-center justify-center w-full sm:w-1/2 md:w-1/3 lg:w-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="<?php echo e(asset('img/titl.svg')); ?>" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Instalasi Tenaga Listrik</p>
                </div>
                <div onclick="window.location.href='<?php echo e(route('tkr')); ?>'"
                    class="flex flex-col items-center justify-center w-full sm:w-1/2 md:w-1/2 lg:w-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="<?php echo e(asset('img/tkr.svg')); ?>" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Kendaraan Ringan</p>
                </div>
                <div onclick="window.location.href='<?php echo e(route('tbsm')); ?>'"
                    class="flex flex-col items-center justify-center w-full sm:w-1/2 md:w-1/3 lg:w-1/5 bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer">
                    <img src="<?php echo e(asset('img/tbsm.svg')); ?>" alt="Icon" class="my-4 h-32 mx-auto">
                    <p class="group-hover:text-black font-bold text-center">Teknik Bisnis dan Sepeda Motor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistik -->
    <section class="my-10">
        <div class="container mx-auto px-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Statistik</h2>
            <div class="flex flex-wrap gap-4 justify-center">
                <!-- Statistik Item -->
                <div onclick="window.location.href='<?php echo e(route('rpl')); ?>'"
                    class="flex flex-col md:flex-row items-center bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer whitespace-normal text-center md:text-left w-full md:w-1/3 lg:w-1/4">
                    <i class="fas fa-user-graduate text-3xl mb-2 md:mb-0 md:mr-4"></i>
                    <div class="flex-grow">
                        <p class="group-hover:text-black font-bold text-start">Jumlah Alumni</p>
                        <p class="group-hover:text-black font-bold text-lg"><?php echo e($jumlahAlumni); ?></p>
                    </div>
                </div>
                <!-- Statistik Item -->
                <div
                    class="flex flex-col md:flex-row items-center bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer whitespace-normal text-center md:text-left w-full md:w-1/3 lg:w-1/4">
                    <i class="fas fa-calendar-day text-3xl mb-2 md:mb-0 md:mr-4"></i>
                    <div class="flex-grow">
                        <p class="group-hover:text-black font-bold text-start">Alumni Terbanyak
                            (<?php echo e($AlumniTerbanyakTahun->tahun_lulus); ?>)</p>
                        <p class="group-hover:text-black font-bold text-lg"><?php echo e($AlumniTerbanyakTahun->jumlah); ?></p>
                    </div>
                </div>
                <!-- Statistik Item -->
                <div
                    class="flex flex-col md:flex-row items-center bg-base-300 p-4 rounded-2xl group hover:bg-warning transition-colors duration-300 cursor-pointer whitespace-normal text-center md:text-left w-full md:w-1/3 lg:w-1/4">
                    <i class="fas fa-book-reader text-3xl mb-2 md:mb-0 md:mr-4"></i>
                    <div class="flex-grow">
                        <p class="group-hover:text-black font-bold text-start">Alumni Terbanyak
                            (<?php echo e($AlumniTerbanyakJurusan->jurusan); ?>)</p>
                        <p class="group-hover:text-black font-bold text-lg"><?php echo e($AlumniTerbanyakJurusan->jumlah); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\website-data-alumni\resources\views/index.blade.php ENDPATH**/ ?>