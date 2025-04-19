@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Data Buku</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="kodebuku" class="form-label">Kode Buku</label>
                            <input placeholder="Entry Kode Buku" type="text" class="form-control @error('kodebuku') is-invalid @enderror" id="kodebuku" name="kodebuku" value="{{ old('kodebuku') }}" required>
                            @error('kodebuku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input placeholder="Entry Judul Buku" type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input placeholder="Entry Pengarang" type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}" required>
                            @error('pengarang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input placeholder="Entry Penerbit" type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit') }}" required>
                            @error('penerbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Terbit</label>
                            <input placeholder="Entry Tahun Terbit" type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}" required maxlength="4">
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_cover" class="form-label">Upload Foto Cover</label>
                            <input type="file" class="form-control @error('foto_cover') is-invalid @enderror" id="foto_cover" name="foto_cover">
                            @error('foto_cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection