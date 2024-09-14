<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Akun - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-base-100">

    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        <?php echo $__env->make('akun.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Container -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            <?php echo $__env->make('akun.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Content Wrapper -->
            <main class="flex-1 p-4">
                <!-- Content Header -->
                <?php echo $__env->make('akun.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <!-- Main Content -->
                <section>
                    <div class=" bg-base-300 shadow-lg rounded-lg p-6">
                        <div class="mb-5">
                            <h3 class="text-lg font-semibold">Edit Profil</h3>
                        </div>
                        <div>
                            <?php if(session('success')): ?>
                                <div class="bg-green-100 text-green-700 p-4 mb-4 rounded">
                                    <?php echo e(session('success')); ?>

                                </div>
                            <?php endif; ?>

                            <form action="<?php echo e(route('edit-akun', ['id' => session('id')])); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="mb-4">
                                    <label for="nama_pengguna" class="block text-sm font-medium">Nama Pengguna</label>
                                    <input type="text" id="nama_pengguna" name="nama_pengguna"
                                        class="form-input mt-1 block w-full shadow-sm p-2 bg-base-100 border border-base-content rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        value="<?php echo e($akun->nama_pengguna); ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="nis" class="block text-sm font-medium">NIS</label>
                                    <input type="text" id="nis" name="nis"
                                        class="form-input mt-1 block w-full shadow-sm p-2 bg-base-100 border border-base-content rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        value="<?php echo e($akun->nis); ?>" required>
                                </div>
                                <div class="mb-4">
                                    <label for="kata_sandi" class="block text-sm font-medium">Kata Sandi</label>
                                    <input type="password" id="kata_sandi" name="kata_sandi"
                                        class="form-input mt-1 block w-full shadow-sm p-2 bg-base-100 border border-base-content rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        placeholder="Kosongkan jika tidak ingin mengubah">
                                </div>
                                <div class="mb-4">
                                    <label for="peran" class="block text-sm font-medium">Peran</label>
                                    <input type="text" id="peran" name="peran"
                                        class="form-input mt-1 block w-full shadow-sm p-2 bg-base-100 border border-base-content rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                        value="<?php echo e($akun->peran); ?>" readonly>
                                </div>
                                <button type="submit" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                            </form>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <!-- Modal -->
        <dialog id="errorModal" class="modal">
            <div class="modal-box">
                <h3 class="text-2xl font-bold">
                    <?php if(session('edit_berhasil')): ?>
                        Edit Akun Berhasil
                    <?php else: ?>
                        Edit Akun Gagal
                    <?php endif; ?>
                </h3>
                <p class="py-4 text-lg text-medium">
                    <?php if(session('validator_fails')): ?>
                        <?php echo e(session('validator_fails')); ?>

                    <?php else: ?>
                        <?php echo e(session('edit_berhasil')); ?>

                    <?php endif; ?>
                </p>
                <div class="modal-action">
                    <button class="btn" onclick="document.getElementById('errorModal').close()">Close</button>
                </div>
            </div>
        </dialog>

        <!-- Script Modal -->
        <script>
            <?php if(session('validator_fails') || session('edit_berhasil')): ?>
                document.getElementById('errorModal').showModal();
            <?php endif; ?>
        </script>

        <!-- Footer -->
        <?php echo $__env->make('akun.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\website-data-alumni\resources\views/akun/profil-akun.blade.php ENDPATH**/ ?>