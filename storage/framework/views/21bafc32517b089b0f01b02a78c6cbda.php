<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-900">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex flex-1">
            <!-- Sidebar -->
            <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <main class="flex-1 p-4">
                <!-- Content Header -->
                <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Main Content -->
                <section>
                    <div class="bg-white p-4 shadow-md rounded">
                        <!-- Filter dan Search -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <!-- Filter Nama -->
                            <div>
                                <label for="searchName" class="block text-sm font-medium text-gray-800">Nama:</label>
                                <input type="text" id="searchName"
                                    class="form-input mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Cari Nama Alumni...">
                            </div>
                            <!-- Filter Jurusan -->
                            <div>
                                <label for="filterMajor"
                                    class="block text-sm font-medium text-gray-800">Jurusan:</label>
                                <select id="filterMajor"
                                    class="form-select mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Jurusan</option>
                                    <?php $__currentLoopData = $jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->nama); ?>"><?php echo e($item->nama); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <!-- Filter Tahun Lulus -->
                            <div>
                                <label for="filterYear" class="block text-sm font-medium text-gray-800">Tahun
                                    Lulus:</label>
                                <select id="filterYear"
                                    class="form-select mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Semua Tahun</option>
                                    <?php $__currentLoopData = $tahunLulus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->tahun_lulus); ?>"><?php echo e($item->tahun_lulus); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                        <!-- Pagination Filter -->
                        <div class="mb-4">
                            <form method="GET" action="<?php echo e(route('admin-data-alumni')); ?>">
                                <label for="per_page" class="block text-sm font-medium text-gray-800">Data per
                                    halaman:</label>
                                <select name="per_page" id="per_page"
                                    class="form-select mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    onchange="this.form.submit()">
                                    <option value="10" <?php echo e(request('per_page') == 10 ? 'selected' : ''); ?>>10</option>
                                    <option value="25" <?php echo e(request('per_page') == 25 ? 'selected' : ''); ?>>25</option>
                                    <option value="50" <?php echo e(request('per_page') == 50 ? 'selected' : ''); ?>>50</option>
                                    <option value="100" <?php echo e(request('per_page') == 100 ? 'selected' : ''); ?>>100
                                    </option>
                                    <option value="200" <?php echo e(request('per_page') == 200 ? 'selected' : ''); ?>>200
                                    </option>
                                    <option value="all" <?php echo e(request('per_page') == 'all' ? 'selected' : ''); ?>>All
                                    </option>
                                </select>
                            </form>
                        </div>

                        <!-- Data Alumni Table -->
                        <div class="overflow-x-auto">
                            <div class="mb-4 flex justify-between items-center">
                                <!-- Tombol Tambah Alumni -->
                                <a href="<?php echo e(route('tambah-data-alumni')); ?>"
                                    class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 flex items-center">
                                    <i class="fas fa-plus mr-2"></i> Tambah Alumni
                                </a>
                                <!-- Form Upload CSV -->
                                <form action="<?php echo e(route('import-csv')); ?>" method="POST" enctype="multipart/form-data"
                                    class="flex items-center space-x-2">
                                    <?php echo csrf_field(); ?>
                                    <input type="file"
                                        class="form-input mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        id="csv_file" name="csv_file" accept=".csv" required>
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Upload</button>
                                </form>
                            </div>
                            <div class="overflow-x-auto">
                                <table
                                    class="min-w-full divide-y divide-gray-200 bg-white border border-gray-300 rounded-md">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tahun Lulus</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Jurusan</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Detail</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr class="border-b hover:bg-gray-50">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <?php echo e($index + 1); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <?php echo e($item->nama_lengkap); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <?php echo e($item->tahun_lulus); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <?php echo e($item->jurusan); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <a href="<?php echo e(route('detail-data-alumni', ['id' => $item->id])); ?>"
                                                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-blue-600">
                                                        <i class="fas fa-eye mr-2"></i> View
                                                    </a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <form
                                                        action="<?php echo e(route('hapus-data-alumni', ['id' => $item->id])); ?>"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah kamu yakin menghapus item ini?');">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit"
                                                            class="inline-flex items-center px-4 py-2 bg-red-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-red-600">
                                                            <i class="fas fa-trash mr-2"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Link Paginasi -->
                            <?php if($paginate): ?>
                                <div class="mt-4 flex justify-center">
                                    <?php echo e($data->links('pagination::tailwind')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <!-- Footer -->
        <?php echo $__env->make('akun.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Custom JS for Search and Filter Functionality -->
    <script>
        $(document).ready(function() {
            // Implement search functionality
            $('#searchName').on('keyup', function() {
                filterTable();
            });

            $('#filterMajor, #filterYear').on('change', function() {
                filterTable();
            });

            function filterTable() {
                let name = $('#searchName').val().toLowerCase();
                let major = $('#filterMajor').val();
                let year = $('#filterYear').val();

                $('tbody tr').each(function() {
                    let rowName = $(this).find('td:nth-child(2)').text().toLowerCase();
                    let rowMajor = $(this).find('td:nth-child(4)').text();
                    let rowYear = $(this).find('td:nth-child(3)').text();

                    let nameMatch = rowName.indexOf(name) !== -1;
                    let majorMatch = major === "" || rowMajor.indexOf(major) !== -1;
                    let yearMatch = year === "" || rowYear.indexOf(year) !== -1;

                    $(this).toggle(nameMatch && majorMatch && yearMatch);
                });
            }
        });
    </script>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/akun/data-alumni.blade.php ENDPATH**/ ?>