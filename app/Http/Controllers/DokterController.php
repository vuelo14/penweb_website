<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('dokter.index', compact('dokters'));
    }
    public function create()
    {
        return view('dokter.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'nip' => 'required',
        'nama' => 'required',
        'jk' => 'required',
        'spesialis' => 'required',
        ]);
        Dokter::create($request->all());
        return redirect()->route('dokter.index')->with('success','Dokter created successfully.');
    }
    public function show(Dokter $dokter)
    {
        return view('dokter.show', compact('dokter'));
    }
    
    public function edit(Dokter $dokter)
    {
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
        'nip' => 'required',
        'nama' => 'required',
        'jk' => 'required',
        'spesialis' => 'required',
        ]);
        $dokter->update($request->all());
        return redirect()->route('dokter.index')->with('success','Dokter updated successfully.');
    }
    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return redirect()->route('dokter.index')->with('success','Dokter deleted successfully.');
    }
}
