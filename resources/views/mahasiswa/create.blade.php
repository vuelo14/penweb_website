@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Mahasiswa</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mahasiswa.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim"
                                    name="nim" value="{{ old('nim') }}" required>
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin</label>
                                <select class="form-select @error('jk') is-invalid @enderror" id="jk" name="jk"
                                    required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ old('jk') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                    <option value="Perempuan" {{ old('jk') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                                    </option>
                                </select>
                                @error('jk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="prodi" class="form-label">Program Studi</label>
                                <select class="form-select @error('prodi') is-invalid @enderror" id="prodi"
                                    name="prodi" required>
                                    <option value="">Pilih Program Studi</option>
                                    @foreach ($prodiList as $prodi)
                                        <option value="{{ $prodi }}" {{ old('prodi') == $prodi ? 'selected' : '' }}>
                                            {{ $prodi }}</option>
                                    @endforeach
                                </select>
                                @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                    id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 form-check">
                                {{-- <input type="checkbox" class="form-check-input" id="nonreg" name="nonreg" {{ old('nonreg') ? 'checked' : '' }}> --}}
                                {{-- <input type="hidden" name="nonreg" value="0"> --}}
                                <input type="checkbox" class="form-check-input" id="nonreg" name="nonreg" value="1"
                                    {{ old('nonreg', $mahasiswa->nonreg ?? false) ? 'checked' : '' }}>
                                <label class="form-check-label" for="nonreg">Mahasiswa Non-Reguler</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
