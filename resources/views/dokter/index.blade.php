@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Daftar Dokter</h1>
        <a href="{{ route('dokter.create') }}" class="btn btn-primary"><i class='fa fa-plus'></i> Tambah Dokter</a>
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="15%">NIP</th>
                    <th scope="col" width="25%">Nama</th>
                    <th scope="col" width="15%">Jenis Kelamin</th>
                    <th scope="col" width="20%">Spesialis</th>
                    <th scope="col" width="25%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $dokter)
                    <tr>
                        <td>{{ $dokter->nip }}</td>
                        <td>{{ $dokter->nama }}</td>
                        <td>{{ $dokter->jk }}</td>
                        <td>{{ $dokter->spesialis }}</td>
                        <td>
                            <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-success"><i class='fa fa-pencil'></i> Edit</a>
                            <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class='fa fa-trash'></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
