@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Jenis Kelamin</th>
                    <th>Program Studi</th>
                    <th>Tanggal Lahir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswa as $item)
                <tr>
                    <td>{{ $loop->iteration + ($mahasiswa->perPage() * ($mahasiswa->currentPage() - 1)) }}</td>
                    <td>{{ $item->nim }}</td>
                    <td>{{ $item->jk }}</td>
                    <td>{{ $item->prodi }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->tgl_lahir)) }}</td>
                    <td>{{ $item->nonreg ? 'Non-Reguler' : 'Reguler' }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $item->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('mahasiswa.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" class="d-inline">
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
        {{ $mahasiswa->links() }}
    </div>
</div>
@endsection