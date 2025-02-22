<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Parking List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        .btn-animate {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-animate:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-animate:active {
            transform: scale(0.95);
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>

    <div class="bg-primary py-4 animate__animated animate__fadeInDown">    
        <h1 class="text-white text-center">Laravel 11 Parking List Project</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('parkir') }}" class="btn btn-primary btn-animate">Back</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4 animate__animated animate__zoomIn" data-aos="fade-up">
                    <div class="card-header bg-primary">
                        <h2 class="text-white">Tambah Data</h2>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('parkir.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="foto_kendaraan" class="form-label h5">Foto Kendaraan</label>
                                <input type="file" class="@error('foto_kendaraan') is-invalid @enderror form-control-lg form-control" name="foto_kendaraan">
                                @error('foto_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="foto_pemilik" class="form-label h5">Foto Pemilik</label>
                                <input type="file" class="@error('foto_pemilik') is-invalid @enderror form-control-lg form-control" name="foto_pemilik">
                                @error('foto_pemilik')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_kendaraan" class="form-label h5">Jenis Kendaraan</label>
                                <input value="{{ old('jenis_kendaraan') }}" type="text" class="@error('jenis_kendaraan') is-invalid @enderror form-control-lg form-control" name="jenis_kendaraan">
                                @error('jenis_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label h5">Nama Pemilik</label>
                                <input value="{{ old('nama_pemilik') }}" type="text" class="@error('nama_pemilik') is-invalid @enderror form-control-lg form-control" name="nama_pemilik">
                                @error('nama_pemilik')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="plat_nomor" class="form-label h5">Plat Nomor</label>
                                <input value="{{ old('plat_nomor') }}" type="text" class="@error('plat_nomor') is-invalid @enderror form-control-lg form-control" name="plat_nomor">
                                @error('plat_nomor')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="warna_kendaraan" class="form-label h5">Warna Kendaraan</label>
                                <input value="{{ old('warna_kendaraan') }}" type="text" class="@error('warna_kendaraan') is-invalid @enderror form-control-lg form-control" name="warna_kendaraan">
                                @error('warna_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-animate">Simpan</button>
                            </div>
                        </div>    
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</body>
</html>
