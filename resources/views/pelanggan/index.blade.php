<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>
</head>
<body>
    <h1>Data Pelanggan - Kelompok 6</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('pelanggan.create') }}">Tambah Pelanggan</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pelanggans as $pelanggan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pelanggan->nama }}</td>
                    <td>{{ $pelanggan->alamat }}</td>
                    <td>{{ $pelanggan->no_telepon }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>
    <a href="{{ route('pelanggan.edit', $pelanggan->id) }}">Edit</a>

    <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}"
          method="POST"
          style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit"
                onclick="return confirm('Yakin ingin menghapus data ini?')">
            Hapus
        </button>
    </form>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada data pelanggan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>