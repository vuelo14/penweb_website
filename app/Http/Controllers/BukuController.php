<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::latest()->paginate(5);
        return view('buku.index', compact('buku'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodebuku' => 'required|unique:buku|max:20',
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'tahun' => 'required|digits:4',
            'foto_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('_token');

        if ($request->hasFile('foto_cover')) {
            $file = $request->file('foto_cover');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/buku', $fileName);
            $data['foto_cover'] = $fileName;
        }

        Buku::create($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil ditambahkan');
    }

    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'kodebuku' => 'required|max:20|unique:buku,kodebuku,' . $buku->id,
            'judul' => 'required|max:255',
            'pengarang' => 'required|max:100',
            'penerbit' => 'required|max:100',
            'tahun' => 'required|digits:4',
            'foto_cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $data = $request->except('_token', '_method');

        if ($request->hasFile('foto_cover')) {
            // Hapus foto lama jika ada
            if ($buku->foto_cover) {
                Storage::delete('public/buku/' . $buku->foto_cover);
            }
            
            $file = $request->file('foto_cover');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/buku', $fileName);
            $data['foto_cover'] = $fileName;
        }

        $buku->update($data);

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil diperbarui');
    }

    public function destroy(Buku $buku)
    {
        if ($buku->foto_cover) {
            Storage::delete('public/buku/' . $buku->foto_cover);
        }
        
        $buku->delete();

        return redirect()->route('buku.index')
            ->with('success', 'Data buku berhasil dihapus');
    }
}