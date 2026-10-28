<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
</head>
<body>

    <h1>Edit Pelanggan</h1>

    @if ($errors->any())
        <div style="color: red;">
            <strong>Data belum berhasil diperbarui:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label for="nama">Nama Pelanggan:</label><br>
            <input type="text" id="nama" name="nama"
                   value="{{ old('nama', $pelanggan->nama) }}" required>
        </p>

        <p>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat"
                   value="{{ old('alamat', $pelanggan->alamat) }}" required>
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"
                   value="{{ old('email', $pelanggan->email) }}">
        </p>

        <p>
            <label for="kategori">Kategori:</label><br>
            <select id="kategori" name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <option value="Umum" {{ old('kategori', $pelanggan->kategori) == 'Umum' ? 'selected' : '' }}>Umum</option>
                <option value="VIP" {{ old('kategori', $pelanggan->kategori) == 'VIP' ? 'selected' : '' }}>VIP</option>
                <option value="Member" {{ old('kategori', $pelanggan->kategori) == 'Member' ? 'selected' : '' }}>Member</option>
            </select>
        </p>

        <p>
            <label for="tanggal_daftar">Tanggal Daftar:</label><br>
            <input type="date" id="tanggal_daftar" name="tanggal_daftar"
                   value="{{ old('tanggal_daftar', $pelanggan->tanggal_daftar) }}" required>
        </p>

        <p>
            <label for="keterangan">Keterangan:</label><br>
            <textarea id="keterangan" name="keterangan" rows="4" cols="30">{{ old('keterangan', $pelanggan->keterangan) }}</textarea>
        </p>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('pelanggan.index') }}">Kembali</a>
    </form>

</body>
</html>