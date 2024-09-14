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
    <style>
        /* Override default styles for mobile */
        @media (max-width: 639px) {
            .sidebar {
                display: none;
                /* Hide sidebar on mobile */
            }

            .main-content {
                margin-left: 0;
                /* Ensure content takes full width */
            }
        }
    </style>
</head>

<body class="bg-base-100">
    <!-- Navbar -->
    @include('akun.navbar')

    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('akun.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-4 main-content">
            <!-- Header -->
            @include('akun.header')

            <!-- Main Section -->
            <section class="space-y-6">
                <!-- Info boxes -->
                <div class="flex flex-wrap gap-6 mb-6">
                    <!-- Total Alumni -->
                    <div class="bg-base-300 p-4 rounded shadow flex items-center space-x-4">
                        <span class="text-3xl text-blue-500"><i class="fas fa-users"></i></span>
                        <div>
                            <h3 class="text-lg font-semibold">Total Alumni</h3>
                            <p class="text-2xl">{{ $totalAlumni }}</p>
                        </div>
                    </div>

                    <!-- Alumni Terbanyak (Tahun) dan Alumni Tersedikit (Tahun) -->
                    <div class="bg-base-300 p-4 rounded shadow flex items-center space-x-4">
                        <span class="text-3xl text-green-500"><i class="fas fa-chart-line"></i></span>
                        <div>
                            <h3 class="text-lg font-semibold">Alumni Terbanyak
                                ({{ $alumniTerbanyakTahun->tahun_lulus }})</h3>
                            <p class="text-2xl">{{ $alumniTerbanyakTahun->jumlah }}</p>
                        </div>
                    </div>
                    <div class="bg-base-300 p-4 rounded shadow flex items-center space-x-4">
                        <span class="text-3xl text-yellow-500"><i class="fas fa-chart-bar"></i></span>
                        <div>
                            <h3 class="text-lg font-semibold">Alumni Tersedikit
                                ({{ $alumniTersedikitTahun->tahun_lulus }})</h3>
                            <p class="text-2xl">{{ $alumniTersedikitTahun->jumlah }}</p>
                        </div>
                    </div>

                    <!-- Alumni Terbanyak (Jurusan) dan Alumni Tersedikit (Jurusan) -->
                    <div class="bg-base-300 p-4 rounded shadow flex items-center space-x-4">
                        <span class="text-3xl text-red-500"><i class="fas fa-school"></i></span>
                        <div>
                            <h3 class="text-lg font-semibold">Alumni Terbanyak ({{ $alumniTerbanyakJurusan->jurusan }})
                            </h3>
                            <p class="text-2xl">{{ $alumniTerbanyakJurusan->jumlah }}</p>
                        </div>
                    </div>
                    <div class="bg-base-300 p-4 rounded shadow flex items-center space-x-4">
                        <span class="text-3xl text-gray-600"><i class="fas fa-code-branch"></i></span>
                        <div>
                            <h3 class="text-lg font-semibold">Alumni Tersedikit
                                ({{ $alumniTersedikitJurusan->jurusan }})</h3>
                            <p class="text-2xl">{{ $alumniTersedikitJurusan->jumlah }}</p>
                        </div>
                    </div>
                </div>

                <!-- Data Alumni Table -->
                <div class="bg-base-300 p-4 rounded shadow mb-6">
                    <h3 class="text-lg font-semibold mb-4">Daftar Data Alumni per Jurusan</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-base-300">
                            <thead>
                                <tr>
                                    <th class="border-b px-4 py-2 text-left">Jurusan</th>
                                    <th class="border-b px-4 py-2 text-left">Jumlah Alumni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumniPerJurusan as $item)
                                    <tr>
                                        <td class="border-b px-4 py-2">{{ $item->jurusan }}</td>
                                        <td class="border-b px-4 py-2">{{ $item->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Alumni Data Chart -->
                <div class="bg-base-300 p-4 rounded shadow">
                    <h3 class="text-lg font-semibold mb-4">Alumni Data Chart</h3>
                    <div class="relative">
                        <canvas id="alumniChart" height="100"></canvas>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Custom JS for Chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Ambil data dari PHP
        var jurusanLabels = {!! json_encode($alumniPerJurusan->pluck('jurusan')) !!};
        var alumniData = {!! json_encode($alumniPerJurusan->pluck('jumlah')) !!};

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
