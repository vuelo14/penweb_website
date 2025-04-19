@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Tambah Dokter</h1>
        <form action="{{ route('dokter.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class='fa fa-floppy-o'></i> Simpan</button>
        </form>
    </div>
@endsection
