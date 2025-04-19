@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="btn btn-primary"><i class='fa fa-plus'></i> Tambah Barang</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th width="15%">Kode Barang</th>
                    <th width="35%">Nama Barang</th>
                    <th width="25%">Harga</th>
                    <th width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($barangs as $barang)
                    <tr>
                        <td>{{ $barang->kodebrg }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-success"><i class='fa fa-pencil'></i> Edit</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
