<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Daftar program studi
    private $prodiList = [
        'Teknik Informatika',
        'Sistem Informasi',
        'Teknik Komputer',
        'Manajemen Informatika',
        'Ilmu Komputer'
    ];

    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(15);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create', [
            'prodiList' => $this->prodiList
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'nim' => 'required|unique:mahasiswa|max:15',
        'jk' => 'required|in:Laki-laki,Perempuan',
        'prodi' => 'required|string',
        'tgl_lahir' => 'required|date',
        'nonreg' => 'sometimes|boolean'
    ]);

    $data = $request->all();
    // $data['nonreg'] = $request->has('nonreg'); // Ini akan mengkonversi ke boolean
    $data['nonreg'] = $request->has('nonreg') ? true : false;

    Mahasiswa::create($data);

    return redirect()->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil ditambahkan');
}

    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'prodiList' => $this->prodiList
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
{
    $request->validate([
        'nim' => 'required|max:15|unique:mahasiswa,nim,' . $mahasiswa->id,
        'jk' => 'required|in:Laki-laki,Perempuan',
        'prodi' => 'required|string',
        'tgl_lahir' => 'required|date',
        'nonreg' => 'sometimes|boolean'
    ]);

    $data = $request->all();
    // $data['nonreg'] = $request->has('nonreg'); // Ini akan mengkonversi ke boolean
    $data['nonreg'] = $request->has('nonreg') ? true : false;

    $mahasiswa->update($data);

    return redirect()->route('mahasiswa.index')
        ->with('success', 'Data mahasiswa berhasil diperbarui');
}

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}