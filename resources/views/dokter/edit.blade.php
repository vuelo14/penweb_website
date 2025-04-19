@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Dokter</h1>
        <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ $dokter->nip }}" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $dokter->nama }}" required>
            </div>
            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                    <option value="L" {{ $dokter->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $dokter->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" name="spesialis" class="form-control" value="{{ $dokter->spesialis }}" required>
            </div>
            <button type="submit" class="btn btn-primary"><i class='fa fa-floppy-o'></i> Update</button>
        </form>
    </div>
@endsection
