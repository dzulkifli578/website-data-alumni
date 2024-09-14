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

<body class="bg-base-100 flex items-center justify-center h-screen">

    <section class="container w-2/3 bg-base-300 p-8 shadow-lg rounded-lg border border-base-content">
        <div class="flex flex-row justify-between">
            <h2 class="text-2xl font-semibold text-center mb-6">Login</h2>
            @include('switch-theme')
        </div>
        <form action="{{ route('proses-login') }}" method="POST">
            @csrf
            <!-- NIS Field -->
            <div class="mb-4">
                <label for="nis" class="block text-sm font-medium">NIS</label>
                <input type="text"
                    class="bg-base-100 w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    id="nis" name="nis" placeholder="Masukkan NIS Anda" required>
            </div>
            <!-- Kata Sandi Field -->
            <div class="mb-6">
                <label for="kata_sandi" class="block text-sm font-medium">Kata Sandi</label>
                <input type="password"
                    class="bg-base-100 w-full mt-1 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 ease-in-out"
                    id="kata_sandi" name="kata_sandi" placeholder="Masukkan Kata Sandi Anda" required>
            </div>
            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" id="loginButton" class="btn btn-primary w-full">Login</button>
            </div>
        </form>
    </section>

    <!-- Modal -->
    <dialog id="errorModal" class="modal">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">Login Error</h3>
            <p class="py-4 text-lg text-medium">
                @if (session('validator_fails'))
                    {{ session('validator_fails') }}
                @elseif (session('nis_tidak_ditemukan'))
                    {{ session('nis_tidak_ditemukan') }}
                @elseif (session('password_tidak_cocok'))
                    {{ session('password_tidak_cocok') }}
                @endif
            </p>
            <div class="modal-action">
                <button class="btn" onclick="document.getElementById('errorModal').close()">Close</button>
            </div>
        </div>
    </dialog>

    <!-- Script Modal -->
    <script>
        @if (session('validator_fails') || session('nis_tidak_ditemukan') || session('password_tidak_cocok'))
            document.getElementById('errorModal').showModal();
        @endif
    </script>
</body>

</html>
