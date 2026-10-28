<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
</head>
<body>
    <h1>Edit Data Pelanggan</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama) }}" required>
        <br><br>

        <label>Alamat:</label><br>
        <textarea name="alamat" required>{{ old('alamat', $pelanggan->alamat) }}</textarea>
        <br><br>

        <label>No. Telepon:</label><br>
        <input type="text" name="no_telepon" value="{{ old('no_telepon', $pelanggan->no_telepon) }}" required>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email', $pelanggan->email) }}">
        <br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="{{ route('pelanggan.index') }}">Kembali</a>
</body>
</html>