@extends('layouts.app')

@section('content')
<style>
    .btn-tambah { background-color: #28a745; color: #ffffff; }
    .btn-tambah:hover { background-color: #218838; }
    .btn-edit { background-color: #ffc107; color: #000000; text-decoration: none; padding: 2px 8px; border-radius: 3px; font-size: 13px; margin-left: 10px; display: inline-block; }
    .alert-sukses { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
    .list-item { margin-bottom: 8px; }
</style>

<h3 style="text-align: center;">Ini adalah halaman Utama Mahasiswa</h3>
<h4>Daftar Nama Mahasiswa</h4>

@if(session('sukses'))
    <div class="alert-sukses" style="padding: 10px; border: 1px solid; margin-bottom: 15px; border-radius: 4px;">
        {{ session('sukses') }}
    </div>
@endif

<a href="{{ route('mahasiswa.create') }}" class="btn-tambah" style="display: inline-block; padding: 6px 12px; text-decoration: none; border-radius: 4px; margin-bottom: 15px;">
    + Tambah Mahasiswa
</a>

<ol>
    @foreach($data_mahasiswa as $i => $k)
        <li class="list-item">
            <strong>{{ $k->nama }}</strong>
            <a href="{{ route('mahasiswa.edit', $k->id) }}" class="btn-edit">Edit</a>
             <form action="{{ route('mahasiswa.destroy', $k->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-hapus">Hapus</button>
            </form>
        </li>
        
    @endforeach
</ol>
@endsection
