@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Buku</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Kode Buku</div>
                        <div class="col-md-8">{{ $buku->kodebuku }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Judul</div>
                        <div class="col-md-8">{{ $buku->judul }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Pengarang</div>
                        <div class="col-md-8">{{ $buku->pengarang }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Penerbit</div>
                        <div class="col-md-8">{{ $buku->penerbit }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tahun Terbit</div>
                        <div class="col-md-8">{{ $buku->tahun }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Cover Buku</div>
                        <div class="col-md-8">
                            @if($buku->foto_cover)
                                <img src="{{ asset('storage/buku/' . $buku->foto_cover) }}" width="200" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada cover</span>
                            @endif
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('buku.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection