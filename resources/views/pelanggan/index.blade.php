<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
</head>
<body>

    <h1>Daftar Pelanggan</h1>

    @if (session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <a href="{{ route('pelanggan.create') }}">+ Tambah Pelanggan</a>

    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
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
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->email ?? '-' }}</td>
                    <td>{{ $pelanggan->kategori ?? '-' }}</td>
                    <td>{{ $pelanggan->tanggal_daftar ?? '-' }}</td>
                    <td>{{ $pelanggan->keterangan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('pelanggan.edit', $pelanggan->id) }}">Edit</a>

                        <form
                            action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
                            method="POST"
                            style="display: inline;"
                            onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Belum ada data pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>