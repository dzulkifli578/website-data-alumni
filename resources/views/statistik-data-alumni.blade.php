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
    @include('navbar')

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
                        @foreach ($alumniPerTahun as $item)
                            <tr class="hover:bg-base-100 border-y border-base-content">
                                <td class="text-center">{{ $item->tahun }}</td>
                                <td class="text-center">{{ $item->jumlah }}</td>
                            </tr>
                        @endforeach
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
                        @foreach ($alumniPerJurusan as $item)
                            <tr class="hover:bg-base-100 border-y border-base-content">
                                <td class="text-center">{{ $item->jurusan }}</td>
                                <td class="text-center">{{ $item->jumlah }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('footer')
</body>

</html>
