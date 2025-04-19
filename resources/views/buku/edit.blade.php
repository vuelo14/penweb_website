@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Buku</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="kodebuku" class="form-label">Kode Buku</label>
                            <input type="text" class="form-control @error('kodebuku') is-invalid @enderror" id="kodebuku" name="kodebuku" value="{{ old('kodebuku', $buku->kodebuku) }}" required>
                            @error('kodebuku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="pengarang" class="form-label">Pengarang</label>
                            <input type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
                            @error('pengarang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="penerbit" class="form-label">Penerbit</label>
                            <input type="text" class="form-control @error('penerbit') is-invalid @enderror" id="penerbit" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" required>
                            @error('penerbit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Terbit</label>
                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $buku->tahun) }}" required maxlength="4">
                            @error('tahun')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="foto_cover" class="form-label">Foto Cover</label>
                            <input type="file" class="form-control @error('foto_cover') is-invalid @enderror" id="foto_cover" name="foto_cover">
                            @error('foto_cover')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @if($buku->foto_cover)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/buku/' . $buku->foto_cover) }}" width="100" class="img-thumbnail">
                                    <p class="text-muted mt-1">Cover saat ini</p>
                                </div>
                            @endif
                        </div>

                        <div class="">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                            <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection