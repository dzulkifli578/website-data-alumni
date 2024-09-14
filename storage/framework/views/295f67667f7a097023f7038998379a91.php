<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Data Alumni - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- DaisyUI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-base-100">

    <!-- Navbar -->
    <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Content Header -->
            <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Main Content -->
            <section>
                <div class="bg-base-300 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Detail Alumni</h2>
                    <form action="<?php echo e(route('edit-data-alumni', ['id' => $data->id])); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="mb-4">
                            <label for="namaLengkap" class="block text-sm font-medium">Nama Lengkap:</label>
                            <input type="text" class="input input-bordered w-full mt-1 bg-base-100" id="namaLengkap"
                                name="nama_lengkap" value="<?php echo e($data->nama_lengkap); ?>">
                        </div>

                        <div class="mb-4">
                            <label for="tahunLulus" class="block text-sm font-medium">Tahun Lulus:</label>
                            <input type="text" class="input input-bordered w-full mt-1 bg-base-100" id="tahunLulus"
                                name="tahun_lulus" value="<?php echo e($data->tahun_lulus); ?>">
                        </div>

                        <div class="mb-6">
                            <label for="jurusan" class="block text-sm font-medium">Jurusan:</label>
                            <select class="select select-bordered w-full mt-1 bg-base-100" id="jurusan"
                                name="jurusan_id">
                                <?php $__currentLoopData = $jurusan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php echo e($item->nama == $data->jurusan ? 'selected' : ''); ?>>
                                        <?php echo e($item->nama); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="flex justify-between">
                            <a href="<?php echo e(route('akun-admin')); ?>" class="btn btn-info">
                                <span class="fas fa-arrow-left mr-2"></span> Kembali
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <span class="fas fa-edit mr-2"></span> Edit
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="modal" class="modal">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">
                <?php if(session('berhasil_edit')): ?>
                    Edit Akun Berhasil
                <?php else: ?>
                    Edit Akun Gagal
                <?php endif; ?>
            </h3>
            <p class="py-4 text-lg text-medium">
                <?php if(session('berhasil_edit')): ?>
                    <?php echo e(session('berhasil_edit')); ?>

                <?php elseif(session('gagal_edit')): ?>
                    <?php echo e(session('gagal_edit')); ?>

                <?php else: ?>
                    <?php echo e(session('validator_fails')); ?>

                <?php endif; ?>
            </p>
            <div class="modal-action">
                <button class="btn" onclick="document.getElementById('errorModal').close()">Close</button>
            </div>
        </div>
    </dialog>

    <!-- Script Modal -->
    <script>
        <?php if(session('berhasil_edit') || session('gagal_edit') || session('validator_fails')): ?>
            document.getElementById('modal').showModal();
        <?php endif; ?>
    </script>

    <!-- Footer -->
    <?php echo $__env->make('akun.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\website-data-alumni\resources\views/akun/detail-data-alumni.blade.php ENDPATH**/ ?>