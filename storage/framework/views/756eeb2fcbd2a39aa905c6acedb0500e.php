<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontributor</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Header -->
    <section class="flex w-full items-center justify-center px-4 md:px-0">
        <div class="bg-base-300 rounded-2xl shadow-xl p-10 mb-10 w-full max-w-screen-lg">
            <h1 class="text-3xl font-bold text-center">Kontributor Kami</h1>
        </div>
    </section>

    <!-- Main Content -->
    <section class="flex flex-col w-full bg-base-100 items-center justify-center px-4 md:px-0">
        <!-- List Kontributor -->
        <div
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-screen-lg bg-base-300 shadow-xl p-6 rounded-lg mb-10">
            <!-- Kontributor 1 -->
            <div class="card bg-base-100 shadow-lg p-6 rounded-lg">
                <img src="<?php echo e(asset('img/person.svg')); ?>" alt="Foto Kontributor" class="rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center">Yusuf Anggara, S.Kom</h3>
                <p class="text-center">Kepala Jurusan Rekayasa Perangkat Lunak</p>
            </div>
            <!-- Kontributor 2 -->
            <div class="card bg-base-100 shadow-lg p-6 rounded-lg">
                <img src="<?php echo e(asset('img/person.svg')); ?>" alt="Foto Kontributor" class="rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center">Yogi Aprilian, S.Kom</h3>
                <p class="text-center">Kepala Manajemen IT SMK Swadhipa 2 Natar</p>
            </div>
            <!-- Kontributor 3 -->
            <div class="card bg-base-100 shadow-lg p-6 rounded-lg">
                <img src="<?php echo e(asset('img/person.svg')); ?>" alt="Foto Kontributor" class="rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center">Yanuar Prayogi, S. Pd</h3>
                <p class="text-center">Kepala Tata Usaha SMK Swadhipa 2 Natar</p>
            </div>
            <!-- Kontributor 4 -->
            <div class="card bg-base-100 shadow-lg p-6 rounded-lg">
                <img src="<?php echo e(asset('img/person.svg')); ?>" alt="Foto Kontributor" class="rounded-full mx-auto mb-4">
                <h3 class="text-xl font-semibold text-center">Dzulkifli Anwar</h3>
                <p class="text-center">Murid magang</p>
            </div>
        </div>
    </section>

    <section class="flex items-center justify-center h-screen">
        <div class="card w-full max-w-md bg-base-300 shadow-lg p-6 rounded-lg text-center">
            <h2 class="text-3xl font-bold mb-4">Under Construction</h2>
            <p class="text-lg mb-4">Saya sedang mengerjakan halaman untuk kontributor. Silahkan cek kembali nanti!</p>
            <img src="<?php echo e(asset('img/under-construction.svg')); ?>" alt="Under Construction"
                class="mx-auto mb-4 w-auto h-52">
            <button class="btn btn-primary" onclick="window.href.location='<?php echo e(route('index')); ?>'">Back to Home</button>
        </div>
    </section>

    <!-- Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\website-data-alumni\resources\views/kontributor.blade.php ENDPATH**/ ?>