<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <!-- Header -->
            <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Main Content -->
                <section class="space-y-6">
                    <!-- Info boxes -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Total Alumni -->
                        <div class="bg-white p-4 rounded shadow">
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl text-blue-500"><i class="fas fa-users"></i></span>
                                <div>
                                    <h3 class="text-lg font-semibold">Total Alumni</h3>
                                    <p class="text-2xl"><?php echo e($totalAlumni); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Alumni Terbanyak (Tahun) dan Alumni Tersedikit (Tahun) -->
                        <div class="bg-white p-4 rounded shadow">
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl text-green-500"><i class="fas fa-chart-line"></i></span>
                                <div>
                                    <h3 class="text-lg font-semibold">Alumni Terbanyak
                                        (<?php echo e($alumniTerbanyakTahun->tahun_lulus); ?>)</h3>
                                    <p class="text-2xl"><?php echo e($alumniTerbanyakTahun->jumlah); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl text-yellow-500"><i class="fas fa-chart-bar"></i></span>
                                <div>
                                    <h3 class="text-lg font-semibold">Alumni Tersedikit
                                        (<?php echo e($alumniTersedikitTahun->tahun_lulus); ?>)</h3>
                                    <p class="text-2xl"><?php echo e($alumniTersedikitTahun->jumlah); ?></p>
                                </div>
                            </div>
                        </div>

                        <!-- Alumni Terbanyak (Jurusan) dan Alumni Tersedikit (Jurusan) -->
                        <div class="bg-white p-4 rounded shadow">
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl text-red-500"><i class="fas fa-school"></i></span>
                                <div>
                                    <h3 class="text-lg font-semibold">Alumni Terbanyak
                                        (<?php echo e($alumniTerbanyakJurusan->jurusan); ?>)</h3>
                                    <p class="text-2xl"><?php echo e($alumniTerbanyakJurusan->jumlah); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded shadow">
                            <div class="flex items-center space-x-4">
                                <span class="text-3xl text-gray-600"><i class="fas fa-code-branch"></i></span>
                                <div>
                                    <h3 class="text-lg font-semibold">Alumni Tersedikit
                                        (<?php echo e($alumniTersedikitJurusan->jurusan); ?>)</h3>
                                    <p class="text-2xl"><?php echo e($alumniTersedikitJurusan->jumlah); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Data Alumni Table -->
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="text-lg font-semibold mb-4">Daftar Data Alumni per Jurusan</h3>
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="border-b px-4 py-2 text-left">Jurusan</th>
                                    <th class="border-b px-4 py-2 text-left">Jumlah Alumni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $alumniPerJurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="border-b px-4 py-2"><?php echo e($item->jurusan); ?></td>
                                        <td class="border-b px-4 py-2"><?php echo e($item->jumlah); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Alumni Data Chart -->
                    <div class="bg-white p-4 rounded shadow">
                        <h3 class="text-lg font-semibold mb-4">Alumni Data Chart</h3>
                        <div class="relative">
                            <canvas id="alumniChart" height="100"></canvas>
                        </div>
                    </div>
                </section>
            </div>
    </div>

    <!-- Custom JS for Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Ambil data dari PHP
        var jurusanLabels = <?php echo json_encode($alumniPerJurusan->pluck('jurusan')); ?>;
        var alumniData = <?php echo json_encode($alumniPerJurusan->pluck('jumlah')); ?>;

        // Data for chart
        var ctx = document.getElementById('alumniChart').getContext('2d');
        var alumniChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: jurusanLabels, // Label jurusan dari database
                datasets: [{
                    label: 'Jumlah Alumni per Jurusan',
                    data: alumniData, // Data jumlah alumni per jurusan dari database
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
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/akun/chart.blade.php ENDPATH**/ ?>