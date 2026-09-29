<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>

   
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf
        <label>NPM:</label><br>
        <input type="text" name="npm" value="{{ old('npm') }}"><br><br>

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ old('nama') }}"><br><br>

        <label>Prodi:</label><br>
        <input type="text" name="prodi" value="{{ old('prodi') }}"><br><br>

        <label>Tahun Masuk:</label><br>
        <input type="number" name="tahunmasuk" value="{{ old('tahunmasuk') }}"><br><br>

        <button type="submit">Simpan Data</button>
        <a href="{{ route('mahasiswa.index') }}">Kembali</a>
    </form>
</body>
</html>
