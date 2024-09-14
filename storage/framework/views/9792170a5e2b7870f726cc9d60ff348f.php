<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <!-- Pastikan Anda mengimpor Tailwind CSS melalui Vite atau langsung dengan link CDN jika diperlukan -->
</head>

<body>
    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Konten Utama -->
    <div class="bg-gray-100 text-gray-800">
        <!-- Padding top untuk memberi jarak dari navbar, padding bottom untuk memberi jarak dari footer -->
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-bold py-5">Statistik Alumni SMK Swadhipa 2 Natar</h2>

            <!-- Statistik Alumni Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 pb-8">
                <div>
                    <h5 class="bg-gray-800 text-white p-3 rounded text-center text-lg font-semibold mb-4">Jumlah
                        Alumni per Tahun</h5>
                    <table class="table-auto w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2">Tahun</th>
                                <th class="px-4 py-2">Jumlah Alumni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $alumniPerTahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-2 border"><?php echo e($item->tahun); ?></td>
                                    <td class="px-4 py-2 border"><?php echo e($item->jumlah); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <h5 class="bg-gray-800 text-white p-3 rounded text-center text-lg font-semibold mb-4">Jumlah
                        Alumni per Jurusan</h5>
                    <table class="table-auto w-full bg-white shadow-md rounded-lg">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-2">Jurusan</th>
                                <th class="px-4 py-2">Jumlah Alumni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $alumniPerJurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="px-4 py-2 border"><?php echo e($item->jurusan); ?></td>
                                    <td class="px-4 py-2 border"><?php echo e($item->jumlah); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Jika menggunakan JS tambahan -->
    <!-- <script src="path/to/your/js"></script> -->
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/statistik-data-alumni.blade.php ENDPATH**/ ?>