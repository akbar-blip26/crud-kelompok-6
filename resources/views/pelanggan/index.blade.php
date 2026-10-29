<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan</title>

    <!-- Bootstrap 5 -->
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

        .main-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
        }

        .table thead th {
            background-color: #eaf2ff;
            color: #174a91;
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
        }

        .kode {
            background-color: #e7f1ff;
            color: #0d6efd;
            padding: 6px 10px;
            border-radius: 6px;
            font-weight: bold;
            white-space: nowrap;
        }

        .judul {
            font-weight: 700;
            color: #243247;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-custom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('pelanggan.index') }}">
                📋 Data Pelanggan
            </a>
            <span class="text-white small">Sistem Informasi Pelanggan</span>
        </div>
    </nav>

    <div class="container py-5">

        <!-- Judul halaman -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <div>
                <h2 class="judul mb-1">Daftar Pelanggan</h2>
                <p class="text-secondary mb-0">
                    Kelola data pelanggan dengan mudah.
                </p>
            </div>

            <a href="{{ route('pelanggan.create') }}"
               class="btn btn-primary px-4 py-2">
                + Tambah Pelanggan
            </a>
        </div>

        <!-- Pesan sukses -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close"
                        data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        <!-- Tabel pelanggan -->
        <div class="card main-card">
            <div class="card-body p-3 p-md-4">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Data Pelanggan</h5>
                    <span class="badge text-bg-primary">
                        Total: {{ $pelanggans->count() }} pelanggan
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Kategori</th>
                                <th>Tanggal Daftar</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($pelanggans as $pelanggan)
                                <tr>
                                    <td>
                                        <span class="kode">
                                            {{ $pelanggan->kode_pelanggan ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $pelanggan->nama }}
                                    </td>

                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->email ?? '-' }}</td>

                                    <td>
                                        <span class="badge rounded-pill
                                            {{ $pelanggan->kategori == 'VIP'
                                                ? 'text-bg-warning'
                                                : 'text-bg-info' }}">
                                            {{ $pelanggan->kategori }}
                                        </span>
                                    </td>

                                    <td>{{ $pelanggan->tanggal_daftar ?? '-' }}</td>
                                    <td>{{ $pelanggan->keterangan ?? '-' }}</td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}"
                                               class="btn btn-sm btn-outline-primary">
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-5">
                                        <p class="text-secondary mb-2">
                                            Belum ada data pelanggan.
                                        </p>
                                        <a href="{{ route('pelanggan.create') }}"
                                           class="btn btn-primary btn-sm">
                                            Tambah Pelanggan
                                        </a>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <p class="text-center text-secondary small mt-4">
            Sistem Informasi Pelanggan &copy; {{ date('Y') }}
        </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>