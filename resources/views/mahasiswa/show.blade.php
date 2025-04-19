@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Detail Mahasiswa</div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">NIM</div>
                        <div class="col-md-8">{{ $mahasiswa->nim }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Jenis Kelamin</div>
                        <div class="col-md-8">{{ $mahasiswa->jk }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Program Studi</div>
                        <div class="col-md-8">{{ $mahasiswa->prodi }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Tanggal Lahir</div>
                        <div class="col-md-8">{{ date('d-m-Y', strtotime($mahasiswa->tgl_lahir)) }}</div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4 fw-bold">Status</div>
                        <div class="col-md-8">{{ $mahasiswa->nonreg ? 'Non-Reguler' : 'Reguler' }}</div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection