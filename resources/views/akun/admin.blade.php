<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SMK Swadhipa 2 Natar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Daisy UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-base-100">

    <!-- Navbar -->
    @include('akun.navbar')

    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        @include('akun.sidebar')

        <!-- Main Content -->
        <main class="flex-1 p-4">
            <!-- Header -->
            @include('akun.header')

            <!-- Dashboard Content -->
            <section>
                <div class="flex flex-wrap gap-4 mb-4">
                    <!-- Info boxes -->
                    <div class="bg-info shadow-md rounded-lg p-4 flex items-center flex-1 min-w-[200px]">
                        <span class="text-2xl text-info-content mr-3"><i class="fas fa-user-shield"></i></span>
                        <div>
                            <h5 class="text-xs md:text-sm font-semibold text-info-content">Total Admin</h5>
                            <p class="text-base md:text-xl text-info-content">{{ $totalAdmin }}</p>
                        </div>
                    </div>
                    <div class="bg-success shadow-md rounded-lg p-4 flex items-center flex-1 min-w-[200px]">
                        <span class="text-2xl text-success-content mr-3"><i class="fas fa-users"></i></span>
                        <div>
                            <h5 class="text-xs md:text-sm font-semibold text-success-content">Total Alumni</h5>
                            <p class="text-base md:text-xl text-success-content">{{ $totalAlumni }}</p>
                        </div>
                    </div>
                    <div class="bg-warning shadow-md rounded-lg p-4 flex items-center flex-1 min-w-[200px]">
                        <span class="text-2xl text-warning-content mr-3"><i class="fas fa-calendar-alt"></i></span>
                        <div>
                            <h5 class="text-xs md:text-sm font-semibold text-warning-content">Tahun Lulusan Awal</h5>
                            <p class="text-base md:text-xl text-warning-content">{{ $tahunAwal->tahun_lulus }}</p>
                        </div>
                    </div>
                    <div class="bg-error shadow-md rounded-lg p-4 flex items-center flex-1 min-w-[200px]">
                        <span class="text-2xl text-error-content mr-3"><i class="fas fa-calendar"></i></span>
                        <div>
                            <h5 class="text-xs md:text-sm font-semibold text-error-content">Tahun Lulusan Akhir</h5>
                            <p class="text-base md:text-xl text-error-content">{{ $tahunTerbaru->tahun_lulus }}</p>
                        </div>
                    </div>
                </div>

                <!-- Data Alumni Table -->
                <div class="bg-base-300 shadow-md rounded-lg p-4 mb-4">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Ringkasan Data Alumni</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-base-content bg-base-300">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">No</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Nama</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Jenis Kelamin</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Tahun Lulus</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Jurusan</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Detail</th>
                                    <th class="px-4 py-3 text-left text-lg text-base-content">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-base-content">
                                @foreach ($data as $index => $item)
                                <tr>
                                    <td class="px-4 py-4 text-sm text-base-content">{{ $index + 1 }}</td>
                                    <td class="px-4 py-4 text-sm text-base-content">{{ $item->nama_lengkap }}</td>
                                    <td class="px-4 py-4 text-sm text-base-content">{{ $item->jenis_kelamin }}</td>
                                    <td class="px-4 py-4 text-sm text-base-content">{{ $item->tahun_lulus }}</td>
                                    <td class="px-4 py-4 text-sm text-base-content">{{ $item->jurusan }}</td>
                                    <td class="px-4 py-4">
                                        <a href="{{ route('detail-data-alumni', ['id' => $item->id]) }}" class="btn btn-info">
                                            <span class="fas fa-eye mr-2"></span> Lihat
                                        </a>
                                    </td>
                                    <td class="px-4 py-4">
                                        <form action="" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error">
                                                <span class="fas fa-trash mr-2"></span> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Alumni Data Chart -->
                <div class="bg-base-300 shadow-md rounded-lg p-4">
                    <h3 class="text-lg md:text-xl font-semibold mb-4">Alumni Data Chart</h3>
                    <canvas id="alumniChart" height="100"></canvas>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    @include('akun.footer')

    <!-- Chart.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <!-- Chart Script -->
    <script>
        const alumniData = @json($alumniPerTahun);
        const labels = alumniData.map(item => item.tahun_lulus);
        const data = alumniData.map(item => item.jumlah);

        const ctx = document.getElementById('alumniChart').getContext('2d');
        const alumniChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Alumni per Tahun',
                    data: data,
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
