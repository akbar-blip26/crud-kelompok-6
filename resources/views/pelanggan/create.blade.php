<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan</title>

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
            <span class="text-white small">Tambah Data</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="mb-4">
                    <h2 class="fw-bold text-dark">Tambah Pelanggan</h2>
                    <p class="text-secondary">
                        Lengkapi formulir berikut untuk menambahkan pelanggan baru.
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

                        <form action="{{ route('pelanggan.store') }}"
                              method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pelanggan</label>
                                <input type="text" name="nama" id="nama"
                                       class="form-control"
                                       value="{{ old('nama') }}"
                                       placeholder="Masukkan nama pelanggan"
                                       required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat"
                                          class="form-control" rows="3"
                                          placeholder="Masukkan alamat pelanggan"
                                          required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email"
                                       class="form-control"
                                       value="{{ old('email') }}"
                                       placeholder="contoh@email.com">
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select name="kategori" id="kategori"
                                        class="form-select" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Umum"
                                        {{ old('kategori') == 'Umum' ? 'selected' : '' }}>
                                        Umum
                                    </option>
                                    <option value="VIP"
                                        {{ old('kategori') == 'VIP' ? 'selected' : '' }}>
                                        VIP
                                    </option>
                                    <option value="Member"
                                        {{ old('kategori') == 'Member' ? 'selected' : '' }}>
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
                                       value="{{ old('tanggal_daftar') }}"
                                       required>
                            </div>

                            <div class="mb-4">
                                <label for="keterangan" class="form-label">
                                    Keterangan
                                </label>
                                <textarea name="keterangan" id="keterangan"
                                          class="form-control" rows="3"
                                          placeholder="Keterangan tambahan (opsional)">{{ old('keterangan') }}</textarea>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary px-4">
                                    Simpan Pelanggan
                                </button>

                                <a href="{{ route('pelanggan.index') }}"
                                   class="btn btn-outline-secondary px-4">
                                    Kembali
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