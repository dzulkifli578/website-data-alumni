<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Konten Utama -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-center text-3xl font-bold mb-8">Statistik Alumni SMK Swadhipa 2 Natar</h2>

        <!-- Statistik Alumni Section -->
        <div class="flex flex-col md:flex-row md:justify-between gap-8">
            <!-- Jumlah Alumni per Tahun -->
            <div class="flex-1 bg-base-200 p-4 rounded-lg shadow-lg">
                <h5 class="bg-base-300 p-3 rounded text-center text-lg font-semibold mb-4">Jumlah Alumni per Tahun</h5>
                <table class="table w-full">
                    <thead class="bg-base-300">
                        <tr>
                            <th class="text-center text-base">Tahun</th>
                            <th class="text-center text-base">Jumlah Alumni</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php $__currentLoopData = $alumniPerTahun; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-base-100 border-y border-base-content">
                                <td class="text-center"><?php echo e($item->tahun); ?></td>
                                <td class="text-center"><?php echo e($item->jumlah); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <!-- Jumlah Alumni per Jurusan -->
            <div class="flex-1 bg-base-200 p-4 rounded-lg shadow-lg">
                <h5 class="bg-base-300 p-3 rounded text-center text-lg font-semibold mb-4">Jumlah Alumni per Jurusan</h5>
                <table class="table w-full">
                    <thead class="bg-base-300">
                        <tr>
                            <th class="text-center text-base">Jurusan</th>
                            <th class="text-center text-base">Jumlah Alumni</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $alumniPerJurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="hover:bg-base-100 border-y border-base-content">
                                <td class="text-center"><?php echo e($item->jurusan); ?></td>
                                <td class="text-center"><?php echo e($item->jumlah); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\website-data-alumni\resources\views/statistik-data-alumni.blade.php ENDPATH**/ ?>