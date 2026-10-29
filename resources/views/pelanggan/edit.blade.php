<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background: linear-gradient(135deg, #0d6efd, #084298);
        }

        .form-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .form-label {
            font-weight: 600;
            color: #243247;
        }

        .form-control, .form-select {
            padding: 11px 12px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold"
               href="{{ route('pelanggan.index') }}">
                📋 Data Pelanggan
            </a>
            <span class="text-white small">Edit Data</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4">
                    <h2 class="fw-bold text-dark">Edit Pelanggan</h2>
                    <p class="text-secondary">
                        Perbarui informasi pelanggan melalui formulir berikut.
                    </p>
                </div>

                <div class="card form-card">
                    <div class="card-body p-4 p-md-5">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Periksa kembali data berikut:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pelanggan.update', $pelanggan->id) }}"
                              method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Kode Pelanggan</label>
                                <input type="text" class="form-control"
                                       value="{{ $pelanggan->kode_pelanggan ?? '-' }}"
                                       readonly>
                                <div class="form-text">
                                    Kode pelanggan tidak dapat diubah.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="nama" id="nama"
                                       class="form-control"
                                       value="{{ old('nama', $pelanggan->nama) }}"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat"
                                          class="form-control" rows="3"
                                          required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                       class="form-control"
                                       value="{{ old('email', $pelanggan->email) }}">
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori"
                                        class="form-select" required>
                                    <option value="Umum"
                                        {{ old('kategori', $pelanggan->kategori) == 'Umum' ? 'selected' : '' }}>
                                        Umum
                                    </option>
                                    <option value="VIP"
                                        {{ old('kategori', $pelanggan->kategori) == 'VIP' ? 'selected' : '' }}>
                                        VIP
                                    </option>
                                    <option value="Member"
                                        {{ old('kategori', $pelanggan->kategori) == 'Member' ? 'selected' : '' }}>
                                        Member
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_daftar" class="form-label">
                                    Tanggal Daftar
                                </label>
                                <input type="date" name="tanggal_daftar"
                                       id="tanggal_daftar"
                                       class="form-control"
                                       value="{{ old('tanggal_daftar', $pelanggan->tanggal_daftar) }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="keterangan" class="form-label">
                                    Keterangan
                                </label>
                                <textarea name="keterangan" id="keterangan"
                                          class="form-control" rows="3">{{ old('keterangan', $pelanggan->keterangan) }}</textarea>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary px-4">
                                    Simpan Perubahan
                                </button>

                                <a href="{{ route('pelanggan.index') }}"
                                   class="btn btn-outline-secondary px-4">
                                    Batal
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

                <p class="text-center text-secondary small mt-4">
                    Sistem Informasi Pelanggan &copy; {{ date('Y') }}
                </p>

            </div>
        </div>
    </div>

</body>
</html>