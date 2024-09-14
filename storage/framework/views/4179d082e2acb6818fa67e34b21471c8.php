<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-900">

    <!-- Navbar -->
    <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Sidebar -->
    <div class="flex">
        <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Content Header -->
            <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <section>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Detail Alumni</h2>
                    <form action="<?php echo e(route('edit-data-alumni', ['id' => $data->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="mb-4">
                            <label for="namaLengkap" class="block text-sm font-medium text-gray-700">Nama
                                Lengkap:</label>
                            <input type="text"
                                class="form-input mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="namaLengkap" name="nama_lengkap" value="<?php echo e($data->nama_lengkap); ?>">
                        </div>
                        <div class="mb-4">
                            <label for="tahunLulus" class="block text-sm font-medium text-gray-700">Tahun Lulus:</label>
                            <input type="text"
                                class="form-input mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="tahunLulus" name="tahun_lulus" value="<?php echo e($data->tahun_lulus); ?>">
                        </div>
                        <div class="mb-6">
                            <label for="jurusan" class="block text-sm font-medium text-gray-700">Jurusan:</label>
                            <select
                                class="form-select mt-1 block w-full shadow-sm p-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                id="jurusan" name="jurusan_id">
                                <?php $__currentLoopData = $jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e($item->nama == $data->jurusan ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="flex justify-between">
                            <a href="<?php echo e(route('akun-admin')); ?>"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-blue-600">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-yellow-500 text-white rounded-md shadow-sm text-sm font-medium hover:bg-yellow-600">
                                <i class="fas fa-edit mr-2"></i> Edit
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- Footer -->
    <?php echo $__env->make('akun.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/akun/detail-data-alumni.blade.php ENDPATH**/ ?>