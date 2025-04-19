<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::latest()->paginate(5);
        return view('karyawan.index', compact('karyawan'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:karyawan|max:20',
            'nama' => 'required|max:100',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/karyawan', $fileName);
            $data['foto'] = $fileName;
        }

        Karyawan::create($data);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', compact('karyawan'));
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nip' => 'required|max:20|unique:karyawan,nip,' . $karyawan->id,
            'nama' => 'required|max:100',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($karyawan->foto) {
                Storage::delete('public/karyawan/' . $karyawan->foto);
            }
            
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/karyawan', $fileName);
            $data['foto'] = $fileName;
        }

        $karyawan->update($data);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy(Karyawan $karyawan)
    {
        if ($karyawan->foto) {
            Storage::delete('public/karyawan/' . $karyawan->foto);
        }
        
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil dihapus');
    }
}