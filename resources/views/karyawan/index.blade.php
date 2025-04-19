@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Data Karyawan</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('karyawan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($karyawan as $item)
                <tr>
                    <td>{{ $loop->iteration + ($karyawan->perPage() * ($karyawan->currentPage() - 1)) }}</td>
                    <td>{{ $item->nip }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jk }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tgl_lahir)) }}</td>
                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/karyawan/' . $item->foto) }}" width="50" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('karyawan.show', $item->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('karyawan.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('karyawan.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $karyawan->links() }}
    </div>
</div>
@endsection