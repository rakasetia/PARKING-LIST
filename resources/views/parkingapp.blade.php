<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parking List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .btn-animated:hover { transform: scale(1.1); transition: 0.3s; }
    </style>
</head>
<body>
    <div class="bg-primary py-4 text-center animate__animated animate__fadeInDown">
        <h1 class="text-white">Laravel 11 Parking List Menegement Project</h1>
    </div>

    <div class="container mt-4" data-aos="fade-up">
        <div class="d-flex justify-content-between">
            <a href="{{ route('dashboard') }}" class="btn btn-primary btn-animated">Dashboard</a>
            <a href="{{ route('parkir.create') }}" class="btn btn-success btn-animated">Tambah Data</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success mt-3 animate__animated animate__fadeIn">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered mt-3 animate__animated animate__fadeInUp">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No</th>
                    <th>Jenis Kendaraan</th>
                    <th>Nama Pemilik</th>
                    <th>Plat Nomor</th>
                    <th>Warna Kendaraan</th>
                    <th>Foto Kendaraan</th>
                    <th>Foto Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_parkir as $key => $parkir)
                <tr data-aos="zoom-in">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $parkir->jenis_kendaraan }}</td>
                    <td>{{ $parkir->nama_pemilik }}</td>
                    <td>{{ $parkir->plat_nomor }}</td>
                    <td>{{ $parkir->warna_kendaraan }}</td>
                    <td>
                        @if ($parkir->foto_kendaraan)
                            <img src="{{ asset('images/upload/' . $parkir->foto_kendaraan) }}" width="50" class="rounded shadow">
                        @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>
                        @if ($parkir->foto_pemilik)
                            <img src="{{ asset('images/upload/' . $parkir->foto_pemilik) }}" width="50" class="rounded shadow">
                        @else
                            Tidak Ada
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('parkir.edit', $parkir->id) }}" class="btn btn-warning btn-sm btn-animated">Edit</a>
                        <form action="{{ route('parkir.destroy', $parkir->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm btn-animated" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-lg animate__animated animate__fadeInUp">
                    @if ($data_parkir->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">&laquo; Prev</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link btn-animated" href="{{ $data_parkir->previousPageUrl() }}">&laquo; Prev</a>
                        </li>
                    @endif

                    @foreach ($data_parkir->getUrlRange(1, $data_parkir->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $data_parkir->currentPage() ? 'active' : '' }}">
                            <a class="page-link btn-animated" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($data_parkir->hasMorePages())
                        <li class="page-item">
                            <a class="page-link btn-animated" href="{{ $data_parkir->nextPageUrl() }}">Next &raquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next &raquo;</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>

    <script>
        AOS.init({ duration: 1000 });
    </script>
</body>
</html>
