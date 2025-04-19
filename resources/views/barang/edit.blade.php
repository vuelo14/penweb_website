@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Barang</h1>
        <form action="{{ route('barang.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kodebrg">Kode Barang</label>
                <input type="text" name="kodebrg" class="form-control" value="{{ $barang->kodebrg }}" required>
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $barang->harga }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
