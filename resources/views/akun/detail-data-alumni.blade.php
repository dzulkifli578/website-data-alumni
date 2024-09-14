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
    @include('akun.navbar')

    <div class="flex">
        <!-- Sidebar -->
        @include('akun.sidebar')

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Content Header -->
            @include('akun.header')

            <!-- Main Content -->
            <section>
                <div class="bg-base-300 shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold mb-4">Detail Alumni</h2>
                    <form action="{{ route('edit-data-alumni', ['id' => $data->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="namaLengkap" class="block text-sm font-medium">Nama Lengkap:</label>
                            <input type="text" class="input input-bordered w-full mt-1 bg-base-100" id="namaLengkap"
                                name="nama_lengkap" value="{{ $data->nama_lengkap }}">
                        </div>

                        <div class="mb-4">
                            <label for="tahunLulus" class="block text-sm font-medium">Tahun Lulus:</label>
                            <input type="text" class="input input-bordered w-full mt-1 bg-base-100" id="tahunLulus"
                                name="tahun_lulus" value="{{ $data->tahun_lulus }}">
                        </div>

                        <div class="mb-6">
                            <label for="jurusan" class="block text-sm font-medium">Jurusan:</label>
                            <select class="select select-bordered w-full mt-1 bg-base-100" id="jurusan"
                                name="jurusan_id">
                                @foreach ($jurusan as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->nama == $data->jurusan ? 'selected' : '' }}>
                                        {{ $item->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex justify-between">
                            <a href="{{ route('akun-admin') }}" class="btn btn-info">
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

</body>

</html>
