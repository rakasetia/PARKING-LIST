<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Parkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .form-control-lg, .btn { transition: transform 0.3s ease-in-out; }
        .form-control-lg:hover, .btn:hover { transform: scale(1.05); }
        .card { border-radius: 15px; box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2); }
        .btn-primary, .btn-success { box-shadow: 2px 2px 10px rgba(0, 0, 255, 0.3); }
    </style>
</head>
<body>

    <div class="bg-primary py-4 text-center" data-aos="fade-down">    
        <h1 class="text-white">Edit Data Parkir</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-10 d-flex justify-content-end">
                <a href="{{ route('parkir') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-lg my-4" data-aos="zoom-in">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Edit Data</h2>
                    </div>

                    <form enctype="multipart/form-data" action="{{ route('parkir.update', $parkir->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="mb-3" data-aos="fade-right">
                                <label class="form-label h5">Foto Kendaraan</label>
                                <input type="file" class="form-control-lg form-control @error('foto_kendaraan') is-invalid @enderror" name="foto_kendaraan">
                                @if($parkir->foto_kendaraan)
                                    <img src="{{ asset('images/upload/' . $parkir->foto_kendaraan) }}" width="150" class="mt-2">
                                @endif
                                @error('foto_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3" data-aos="fade-left">
                                <label class="form-label h5">Foto Pemilik</label>
                                <input type="file" class="form-control-lg form-control @error('foto_pemilik') is-invalid @enderror" name="foto_pemilik">
                                @if($parkir->foto_pemilik)
                                    <img src="{{ asset('images/upload/' . $parkir->foto_pemilik) }}" width="150" class="mt-2">
                                @endif
                                @error('foto_pemilik')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3" data-aos="fade-up">
                                <label class="form-label h5">Jenis Kendaraan</label>
                                <input value="{{ old('jenis_kendaraan', $parkir->jenis_kendaraan) }}" type="text" class="form-control-lg form-control @error('jenis_kendaraan') is-invalid @enderror" name="jenis_kendaraan">
                                @error('jenis_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3" data-aos="fade-up">
                                <label class="form-label h5">Nama Pemilik</label>
                                <input value="{{ old('nama_pemilik', $parkir->nama_pemilik) }}" type="text" class="form-control-lg form-control @error('nama_pemilik') is-invalid @enderror" name="nama_pemilik">
                                @error('nama_pemilik')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3" data-aos="fade-up">
                                <label class="form-label h5">Plat Nomor</label>
                                <input value="{{ old('plat_nomor', $parkir->plat_nomor) }}" type="text" class="form-control-lg form-control @error('plat_nomor') is-invalid @enderror" name="plat_nomor">
                                @error('plat_nomor')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3" data-aos="fade-up">
                                <label class="form-label h5">Warna Kendaraan</label>
                                <input value="{{ old('warna_kendaraan', $parkir->warna_kendaraan) }}" type="text" class="form-control-lg form-control @error('warna_kendaraan') is-invalid @enderror" name="warna_kendaraan">
                                @error('warna_kendaraan')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="d-grid" data-aos="flip-up">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>    
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 1000 });
    </script>

</body>
</html>
