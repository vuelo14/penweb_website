<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }
    public function create()
    {
        return view('barang.create');
    }
    public function store(Request $request)
    {
        $request->validate([
        'kodebrg' => 'required',
        'nama_barang' => 'required',
        'harga' => 'required',
        ]);
        Barang::create($request->all());
        return redirect()->route('barang.index')->with('success','Barang created successfully.');
    }
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }
    
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
        'kodebrg' => 'required',
        'nama_barang' => 'required',
        'harga' => 'required',
        ]);
        $barang->update($request->all());
        return redirect()->route('barang.index')->with('success','Barang updated successfully.');
    }
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success','Barang deleted successfully.');
    }
}
