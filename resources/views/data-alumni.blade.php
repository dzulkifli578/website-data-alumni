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
</head>

<body>

    <!-- Navbar -->
    @include('navbar')

    <section class="bg-base-100">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl font-bold my-4">Data Alumni SMK Swadhipa 2 Natar</h2>

            <!-- Cari dan Filter Section -->
            <section class="bg-base-300 p-4 mt-4 rounded-lg mb-8">
                <!-- Input Cari Nama -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <input type="text" id="searchName"
                            class="form-input w-full p-3 border rounded-lg bg-base-100"
                            placeholder="Cari berdasarkan nama">
                    </div>
                    <!-- Filter tahun lulus -->
                    <div>
                        <select id="filterYear" class="form-select w-full p-3 border rounded-lg bg-base-100">
                            <option value="" disabled selected>Tahun Lulus</option>
                            @foreach ($tahunLulus as $item)
                                <option value="{{ $item->tahun }}">{{ $item->tahun }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Filter jurusan -->
                    <div>
                        <select id="filterMajor" class="form-select w-full p-3 border rounded-lg bg-base-100">
                            <option value="" selected>Jurusan</option>
                            @foreach ($jurusan as $item)
                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>

            <!-- Tabel Data Alumni -->
            <section class="overflow-x-auto mb-8">
                <table class="table border border-base-content shadow-lg">
                    <thead>
                        <tr class="bg-base-300">
                            <th class="py-3 px-6 text-center text-lg">No</th>
                            <th class="py-3 px-6 text-start text-lg">Nama</th>
                            <th class="py-3 px-6 text-start text-lg">Jenis Kelamin</th>
                            <th class="py-3 px-6 text-center text-lg">Tahun Lulus</th>
                            <th class="py-3 px-6 text-center text-lg">Jurusan</th>
                        </tr>
                    </thead>
                    <tbody id="alumniTableBody">
                        @foreach ($data as $item)
                            <tr class="border-b border-base-content">
                                <td class="py-3 px-6 text-center">{{ $item->id }}</td>
                                <td class="py-3 px-6">{{ $item->nama_lengkap }}</td>
                                <td class="py-3 px-6">{{ $item->jenis_kelamin }}</td>
                                <td class="py-3 px-6 text-center">{{ $item->tahun_lulus }}</td>
                                <td class="py-3 px-6 text-center">{{ $item->jurusan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>

            <!-- Pagination -->
            <div class="pt-6 pb-6 flex justify-center">
                <div id="paginationControls" class="join">
                    <!-- Pagination buttons will be added here by JavaScript -->
                </div>
            </div>
        </div>
        <!-- Footer -->
        @include('footer')

    </section>

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
                const name = row.cells[1].textContent.toLowerCase();
                row.style.display = name.includes(query) ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });

        // Filter Tahun Lulus
        document.getElementById('filterYear').addEventListener('change', function() {
            const year = this.value;
            rows.forEach(row => {
                const alumniYear = row.cells[2].textContent;
                row.style.display = year === '' || alumniYear === year ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });

        // Filter Jurusan
        document.getElementById('filterMajor').addEventListener('change', function() {
            const major = this.value;
            rows.forEach(row => {
                const alumniMajor = row.cells[3].textContent;
                row.style.display = major === '' || alumniMajor === major ? '' : 'none';
            });
            setupPagination(); // Refresh pagination
        });
    </script>
</body>

</html>
