<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md p-8 bg-white shadow-lg rounded-lg border border-gray-300">
        <h2 class="text-2xl font-semibold text-center text-gray-900 mb-6">Login</h2>
        <form action="<?php echo e(route('proses-login')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <!-- NIS Field -->
            <div class="mb-4">
                <label for="nis" class="block text-sm font-medium text-gray-700">NIS</label>
                <input type="text"
                    class="bg-white w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    id="nis" name="nis" placeholder="Masukkan NIS Anda" required>
            </div>
            <!-- Kata Sandi Field -->
            <div class="mb-6">
                <label for="kata_sandi" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                <input type="password"
                    class="bg-white w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    id="kata_sandi" name="kata_sandi" placeholder="Masukkan Kata Sandi Anda" required>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" id="loginButton"
                    class="w-full py-3 px-4 rounded-lg bg-blue-500 text-white font-medium hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-150 ease-in-out">Login</button>
            </div>
        </form>
    </div>
</body>

</html>
<?php /**PATH D:\Dzulkifli\Laravel\data_alumni\resources\views/login.blade.php ENDPATH**/ ?>