<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa as MahasiswaModel;
use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    public function index()
    {
        $data_mahasiswa = MahasiswaModel::all();
        return view('viewmahasiswa', compact('data_mahasiswa'));
    }

    public function create()
    {
        return view('layouts.tambahmahasiswa');
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:mahasiswas,npm|max:20',
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:10',
            'tahunmasuk' => 'required|integer|digits:4',
        ], [
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM sudah terdaftar di database.',
            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'prodi.required' => 'Program studi wajib diisi.',
            'tahunmasuk.required' => 'Tahun masuk wajib diisi.',
            'tahunmasuk.digits' => 'Tahun masuk harus berbentuk 4 digit angka (Contoh: 2018).',
        ]);

        MahasiswaModel::create([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('sukses', 'Data mahasiswa berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);
        return view('layouts.editmahasiswa', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);

        $request->validate([
            'npm' => 'required|max:20|unique:mahasiswas,npm,' . $id,
            'nama' => 'required|string|max:100',
            'prodi' => 'required|string|max:10',
            'tahunmasuk' => 'required|integer|digits:4',
        ], [
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM sudah terdaftar di database.',
            'nama.required' => 'Nama mahasiswa wajib diisi.',
            'prodi.required' => 'Program studi wajib diisi.',
            'tahunmasuk.required' => 'Tahun masuk wajib diisi.',
            'tahunmasuk.digits' => 'Tahun masuk harus berbentuk 4 digit angka.',
        ]);

        $mahasiswa->update([
            'npm' => $request->npm,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'tahunmasuk' => $request->tahunmasuk,
        ]);

        return redirect()->route('mahasiswa.index')->with('sukses', 'Data mahasiswa berhasil diperbarui!');
    }
    public function destroy(string $id)
    {
        $mahasiswa = MahasiswaModel::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('sukses', 'Data mahasiswa berhasil dihapus!');
    }
}
