@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Karyawan</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">NIP</div>
                        <div class="col-md-8">{{ $karyawan->nip }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Nama</div>
                        <div class="col-md-8">{{ $karyawan->nama }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Jenis Kelamin</div>
                        <div class="col-md-8">{{ $karyawan->jk }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tanggal Lahir</div>
                        <div class="col-md-8">{{ date('d-m-Y', strtotime($karyawan->tgl_lahir)) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Foto</div>
                        <div class="col-md-8">
                            @if($karyawan->foto)
                                <img src="{{ asset('storage/karyawan/' . $karyawan->foto) }}" width="200" class="img-thumbnail">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection