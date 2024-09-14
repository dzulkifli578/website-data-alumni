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
</head>

<body>
    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Hero Section -->
    <section class="relative bg-cover bg-center text-white py-20"
        style="background-image: url('<?php echo e(asset('img/sekolah.jpg')); ?>');">
        <div class="absolute inset-0 bg-black/50 z-10"></div>
        <div class="relative z-20 container mx-auto text-center px-4">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">Selamat Datang di Web Data Alumni</h1>
            <p class="text-base md:text-lg lg:text-xl mb-6">Hubungkan masa lalu dengan masa depan. Jelajahi dan tetap terhubung dengan sesama alumni.</p>
            <a href="<?php echo e(route('data-alumni')); ?>"
                class="btn btn-outline btn-light text-white border-white hover:bg-white hover:text-black py-2 px-4 md:py-3 md:px-6 rounded-full">Lihat Semua Alumni</a>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="bg-gray-100 py-20 px-4">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-semibold text-gray-800 mb-6">Pesan Dari Kreator</h2>
            <p class="text-base md:text-lg lg:text-xl font-semibold text-gray-800 italic mb-6">
                "Pertemuan adalah awal dari perpisahan. Perpisahan adalah akhir dari pertemuan.<br>
                Selama kamu masih bisa bertemu, setidaknya tinggalkan kesan mendalam untuknya."
            </p>
            <a href="<?php echo e(route('data-alumni')); ?>" class="btn btn-outline btn-primary py-2 px-4 md:py-3 md:px-6 rounded-full">Lihat Semua Alumni</a>
        </div>
    </section>

    <!-- Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/index.blade.php ENDPATH**/ ?>