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

<body class="bg-base-100">
    <div class="flex flex-col min-h-screen">
        <!-- Navbar -->
        @include('akun.navbar')

        <!-- Sidebar -->
        @include('akun.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-4">
            <!-- Content Header -->
            @include('akun.header')

            <!-- Main Content -->
            <section>
                <div class="bg-base-300 p-4 shadow-md rounded">
                    <!-- Filter dan Search -->
                    <div class="flex flex-col md:flex-row md:flex-wrap gap-4 mb-4">
                        <!-- Filter Nama -->
                        <div class="flex-1">
                            <label for="searchName" class="block text-sm font-medium">Nama:</label>
                            <input type="text" id="searchName" class="input input-bordered mt-1 block w-full"
                                placeholder="Cari Nama Alumni...">
                        </div>
                        <!-- Filter Jurusan -->
                        <div class="flex-1">
                            <label for="filterMajor" class="block text-sm font-medium">Jurusan:</label>
                            <select id="filterMajor" class="select select-bordered mt-1 block w-full">
                                <option value="">Semua Jurusan</option>
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Filter Tahun Lulus -->
                        <div class="flex-1">
                            <label for="filterYear" class="block text-sm font-medium">Tahun Lulus:</label>
                            <select id="filterYear" class="select select-bordered mt-1 block w-full">
                                <option value="">Semua Tahun</option>
                                @foreach ($tahunLulus as $item)
                                    <option value="{{ $item->tahun_lulus }}">{{ $item->tahun_lulus }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <!-- Data Alumni Table -->
                <div class="overflow-x-auto">
                    <div class="mb-4 flex justify-between items-center mt-4">
                        <!-- Tombol Tambah Alumni -->
                        <a href="{{ route('tambah-data-alumni') }}" class="btn btn-success">
                            <i class="fas fa-plus mr-2"></i> Tambah Alumni
                        </a>
                        <!-- Form Upload CSV -->
                        <form action="{{ route('import-csv') }}" method="POST" enctype="multipart/form-data"
                            class="flex items-center space-x-2">
                            @csrf
                            <input type="file" class="file-input" id="csv_file" name="csv_file" accept=".csv"
                                required>
                            <button type="submit" class="btn btn-info">Upload</button>
                        </form>
                    </div>
                    <table class="table table-zebra w-full bg-base-100 rounded-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tahun Lulus</th>
                                <th>Jurusan</th>
                                <th>Detail</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="alumniTableBody">
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->jenis_kelamin }}</td>
                                    <td>{{ $item->tahun_lulus }}</td>
                                    <td>{{ $item->jurusan }}</td>
                                    <td>
                                        <a href="{{ route('detail-data-alumni', ['id' => $item->id]) }}"
                                            class="btn btn-info btn-sm">
                                            <span class="fas fa-eye mr-2"></span> Lihat
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('hapus-data-alumni', ['id' => $item->id]) }}"
                                            method="POST"
                                            onsubmit="return confirm('Apakah kamu yakin menghapus item ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-error btn-sm">
                                                <span class="fas fa-trash mr-2"></span> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="pt-6 pb-6 flex justify-center">
                        <div id="paginationControls" class="join">
                            <!-- Pagination buttons will be added here by JavaScript -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Modal -->
    <dialog id="modal" class="modal">
        <div class="modal-box">
            <h3 class="text-2xl font-bold">
                @if (session('berhasil_edit'))
                    Edit Akun Berhasil
                @else
                    Edit Akun Gagal
                @endif
            </h3>
            <p class="py-4 text-lg text-medium">
                @if (session('berhasil_edit'))
                    {{ session('berhasil_edit') }}
                @elseif (session('gagal_edit'))
                    {{ session('gagal_edit') }}
                @else
                    {{ session('validator_fails') }}
                @endif
            </p>
            <div class="modal-action">
                <button class="btn" onclick="document.getElementById('errorModal').close()">Close</button>
            </div>
        </div>
    </dialog>

    <!-- Script Modal -->
    <script>
        @if (session('berhasil_edit') || session('gagal_edit') || session('validator_fails'))
            document.getElementById('modal').showModal();
        @endif
    </script>

    <!-- Footer -->
    @include('akun.footer')

    <!-- Search, Filter, and Paginate JS -->
    <script>
        const rowsPerPage = 10; // Jumlah baris per halaman
        let rows = Array.from(document.querySelectorAll('#alumniTableBody tr'));
        const paginationControls = document.getElementById('paginationControls');
        let currentPage = 1;

        function displayPage(page) {
            const start = (page - 1) * rowsPerPage;
            const end = start + rowsPerPage;

            rows.forEach((row, index) => {
                row.style.display = (index >= start && index < end) ? '' : 'none';
            });
        }

        function setupPagination() {
            const pageCount = Math.ceil(rows.length / rowsPerPage);
            paginationControls.innerHTML = '';

            if (pageCount <= 1) return; // No need for pagination if only one page

            // Previous Button
            const prevButton = document.createElement('button');
            prevButton.className = 'join-item btn';
            prevButton.innerText = '«';
            prevButton.disabled = currentPage === 1;
            prevButton.onclick = () => {
                if (currentPage > 1) {
                    goToPage(currentPage - 1);
                }
            };
            paginationControls.appendChild(prevButton);

            // Page Indicator
            const pageIndicator = document.createElement('button');
            pageIndicator.className = 'join-item btn';
            pageIndicator.id = 'pageIndicator';
            paginationControls.appendChild(pageIndicator);

            // Next Button
            const nextButton = document.createElement('button');
            nextButton.className = 'join-item btn';
            nextButton.innerText = '»';
            nextButton.disabled = currentPage === pageCount;
            nextButton.onclick = () => {
                if (currentPage < pageCount) {
                    goToPage(currentPage + 1);
                }
            };
            paginationControls.appendChild(nextButton);

            updatePaginationControls(currentPage, pageCount);
        }

        function updatePaginationControls(page, pageCount) {
            const pageIndicator = document.getElementById('pageIndicator');
            pageIndicator.innerText = `Page ${page} of ${pageCount}`;
        }

        function goToPage(page) {
            currentPage = page;
            displayPage(page);
            setupPagination(); // Update pagination controls after changing page
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                rows = Array.from(document.querySelectorAll(
                    '#alumniTableBody tr')); // Reinitialize rows after DOM is loaded
                setupPagination();
                displayPage(currentPage);
            }, 0); // Use a timeout of 0 to defer execution until the next event loop
        });

        // Filter Nama
        document.getElementById('searchName').addEventListener('keyup', function() {
            const query = this.value.toLowerCase();
            rows.forEach(row => {
                const name = row.cells[1].textContent.toLowerCase(); // Adjust index for Nama
                row.style.display = name.includes(query) ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });

        // Filter Tahun Lulus
        document.getElementById('filterYear').addEventListener('change', function() {
            const year = this.value;
            rows.forEach(row => {
                const alumniYear = row.cells[3].textContent; // Adjust index for Tahun Lulus
                row.style.display = year === '' || alumniYear === year ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });

        // Filter Jurusan
        document.getElementById('filterMajor').addEventListener('change', function() {
            const major = this.value;
            rows.forEach(row => {
                const alumniMajor = row.cells[4].textContent; // Adjust index for Jurusan
                row.style.display = major === '' || alumniMajor === major ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });
    </script>
</body>

</html>
