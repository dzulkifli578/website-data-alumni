<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Override default styles for mobile */
        @media (max-width: 639px) {
            .sidebar {
                display: none; /* Hide sidebar on mobile */
            }
            .main-content {
                margin-left: 0; /* Ensure content takes full width */
            }
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
            <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <main class="flex-1 p-4 main-content">
            <!-- Header -->
            <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Dashboard Content -->
            <section>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
                    <!-- Info boxes -->
                    <div class="bg-blue-200 shadow-md rounded-lg p-4">
                        <div class="flex items-center">
                            <span class="text-2xl text-blue-500 mr-3"><i class="fas fa-user-shield"></i></span>
                            <div>
                                <h5 class="text-xs md:text-sm font-semibold">Total Admin</h5>
                                <p class="text-base md:text-xl"><?php echo e($totalAdmin); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-green-200 shadow-md rounded-lg p-4">
                        <div class="flex items-center">
                            <span class="text-2xl text-green-500 mr-3"><i class="fas fa-users"></i></span>
                            <div>
                                <h5 class="text-xs md:text-sm font-semibold">Total Alumni</h5>
                                <p class="text-base md:text-xl"><?php echo e($totalAlumni); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-yellow-200 shadow-md rounded-lg p-4">
                        <div class="flex items-center">
                            <span class="text-2xl text-yellow-500 mr-3"><i class="fas fa-calendar-alt"></i></span>
                            <div>
                                <h5 class="text-xs md:text-sm font-semibold">Tahun Lulusan Awal</h5>
                                <p class="text-base md:text-xl"><?php echo e($tahunAwal->tahun_lulus); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-red-200 shadow-md rounded-lg p-4">
                        <div class="flex items-center">
                            <span class="text-2xl text-red-500 mr-3"><i class="fas fa-calendar"></i></span>
                            <div>
                                <h5 class="text-xs md:text-sm font-semibold">Tahun Lulusan Akhir</h5>
                                <p class="text-base md:text-xl"><?php echo e($tahunTerbaru->tahun_lulus); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Data Alumni Table -->
                <div class="bg-white shadow-md rounded-lg p-4 mb-4">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Ringkasan Data Alumni</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun Lulus</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jurusan</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Detail</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo e($index + 1); ?></td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->nama_lengkap); ?></td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->tahun_lulus); ?></td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo e($item->jurusan); ?></td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="<?php echo e(route('detail-data-alumni', ['id' => $item->id])); ?>" class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-blue-600">
                                                <i class="fas fa-eye mr-2"></i> View
                                            </a>
                                        </td>
                                        <td class="px-4 py-4 whitespace-nowrap text-sm font-medium">
                                            <form action="" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-red-600">
                                                    <i class="fas fa-trash mr-2"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Alumni Data Chart -->
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Alumni Data Chart</h3>
                    <canvas id="alumniChart" height="100"></canvas>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('akun.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <!-- Chart Script -->
    <script>
        const alumniData = <?php echo json_encode($alumniPerTahun, 15, 512) ?>;
        const labels = alumniData.map(item => item.tahun_lulus);
        const data = alumniData.map(item => item.jumlah);

        const ctx = document.getElementById('alumniChart').getContext('2d');
        const alumniChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Alumni per Tahun',
                    data: data,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/akun/admin.blade.php ENDPATH**/ ?>