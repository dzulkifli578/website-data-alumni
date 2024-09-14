<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>

<body>

    <!-- Navbar -->
    <?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <section class="bg-gray-100 text-gray-800">
        <!-- Konten Utama -->
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-bold text-gray-900 pt-5 pb-2">Data Alumni SMK Swadhipa 2 Natar</h2>

            <!-- Cari dan Filter Section -->
            <div class="bg-gray-200 p-4 mt-4 rounded-lg mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Input Cari Nama -->
                    <div>
                        <input type="text" id="searchName"
                            class="form-input w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900"
                            placeholder="Cari berdasarkan nama">
                    </div>
                    <!-- Filter tahun lulus -->
                    <div>
                        <select id="filterYear"
                            class="form-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900">
                            <option value="" disable selected>Tahun Lulus</option>
                            <?php $__currentLoopData = $tahunLulus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->tahun); ?>"><?php echo e($item->tahun); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <!-- Filter jurusan -->
                    <div>
                        <select id="filterMajor"
                            class="form-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900">
                            <option value="" selected>Jurusan</option>
                            <?php $__currentLoopData = $jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->nama); ?>"><?php echo e($item->nama); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <!-- Filter Paginate -->
                <form method="GET" action="<?php echo e(route('data-alumni')); ?>" class="mt-4">
                    <label for="per_page" class="block text-gray-700">Data per halaman:</label>
                    <select name="per_page" id="per_page"
                        class="form-select w-full p-3 border border-gray-300 rounded-lg bg-white text-gray-900"
                        onchange="this.form.submit()">
                        <option value="10" <?php echo e(request('per_page') == 10 ? 'selected' : ''); ?>>10</option>
                        <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>25</option>
                        <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50</option>
                        <option value="100" <?php echo e(request('per_page') == 100 ? 'selected' : ''); ?>>100</option>
                        <option value="200" <?php echo e(request('per_page') == 200 ? 'selected' : ''); ?>>200</option>
                        <option value="semua" <?php echo e(request('per_page') == 'semua' ? 'selected' : ''); ?>>Semua</option>
                    </select>
                </form>
            </div>

            <!-- Tabel Data Alumni -->
            <div class="overflow-x-auto mb-8">
                <table class="min-w-full bg-white rounded-lg shadow">
                    <thead>
                        <tr class="bg-gray-800 text-white">
                            <th class="py-3 px-6">No</th>
                            <th class="py-3 px-6">Nama</th>
                            <th class="py-3 px-6">Tahun Lulus</th>
                            <th class="py-3 px-6">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody id="alumniTableBody">
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-b border-gray-200">
                                <td class="py-3 px-6 text-center"><?php echo e($index + 1); ?></td>
                                <td class="py-3 px-6"><?php echo e($item->nama_lengkap); ?></td>
                                <td class="py-3 px-6 text-center"><?php echo e($item->tahun_lulus); ?></td>
                                <td class="py-3 px-6 text-center"><?php echo e($item->jurusan); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
            <?php if($paginate): ?>
                <div class="pt-6 pb-6 flex justify-center">
                    <?php echo e($data->links('pagination::tailwind')); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Footer -->
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </section>

    <!-- Custom JS untuk fungsi search dan filter -->
    <script>
        document.getElementById('searchName').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            const rows = document.querySelectorAll('#alumniTableBody tr');
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase(); // Indeks 1 untuk kolom Nama
                row.style.display = name.includes(query) ? '' : 'none';
            });
        });

        document.getElementById('filterYear').addEventListener('change', function() {
            const year = this.value;
            const rows = document.querySelectorAll('#alumniTableBody tr');
            rows.forEach(row => {
                const alumniYear = row.cells[2].textContent; // Indeks 2 untuk kolom Tahun Lulus
                row.style.display = year === '' || alumniYear === year ? '' : 'none';
            });
        });

        document.getElementById('filterMajor').addEventListener('change', function() {
            const major = this.value;
            const rows = document.querySelectorAll('#alumniTableBody tr');
            rows.forEach(row => {
                const alumniMajor = row.cells[3].textContent; // Indeks 3 untuk kolom Jurusan
                row.style.display = major === '' || alumniMajor === major ? '' : 'none';
            });
        });
    </script>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/data-alumni.blade.php ENDPATH**/ ?>