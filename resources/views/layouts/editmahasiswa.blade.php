<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>NPM:</label><br>
        <input type="text" name="npm" value="{{ old('npm', $mahasiswa->npm) }}"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama', $mahasiswa->nama) }}"><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}"><br><br>

        <label>Tahun Masuk:</label><br>
        <input type="number" name="tahunmasuk" value="{{ old('tahunmasuk', $mahasiswa->tahunmasuk) }}"><br><br>

        <button type="submit">Perbarui Data</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>
</body>
</html>
