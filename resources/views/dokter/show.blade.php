@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Detail Dokter</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $dokter->nama }}</h5>
                <p class="card-text">NIP: {{ $dokter->nip }}</p>
                <p class="card-text">Jenis Kelamin: {{ $dokter->jk }}</p>
                <p class="card-text">Spesialis: {{ $dokter->spesialis }}</p>
                <a href="{{ route('dokter.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
@endsection
