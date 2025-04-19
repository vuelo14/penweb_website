@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h1>Data Buku</h1>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('buku.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Cover</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $item)
                <tr>
                    <td>{{ $loop->iteration + ($buku->perPage() * ($buku->currentPage() - 1)) }}</td>
                    <td>{{ $item->kodebuku }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->pengarang }}</td>
                    <td>{{ $item->penerbit }}</td>
                    <td>{{ $item->tahun }}</td>
                    <td>
                        @if($item->foto_cover)
                            <img src="{{ asset('storage/buku/' . $item->foto_cover) }}" width="50" class="img-thumbnail">
                        @else
                            <span class="text-muted">Tidak ada cover</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('buku.show', $item->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('buku.edit', $item->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('buku.destroy', $item->id) }}" method="POST" class="d-inline">
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
        {{ $buku->links() }}
    </div>
</div>
@endsection