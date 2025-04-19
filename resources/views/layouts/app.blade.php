<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel CRUD')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container">
            <a class="navbar-brand text-white" href="/">CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ Request::routeIs('home') ? 'active bg-primary' : '' }}">
                        <a class="nav-link text-white" href="/"><i class='fa fa-home'></i> Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('dokter.index') }}">Dokter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('barang.index') }}">Barang</a>
                    </li> --}}
                    <li class="nav-item {{ Request::routeIs('karyawan.*') ? 'active bg-primary' : '' }}">
                        <a class="nav-link text-white" href="{{ route('karyawan.index') }}">Karyawan</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('buku.*') ? 'active bg-primary' : '' }}">
                        <a class="nav-link text-white" href="{{ route('buku.index') }}">Buku</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('mahasiswa.*') ? 'active bg-primary' : '' }}">
                        <a class="nav-link text-white" href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>

    <footer class="bg-light text-center text-lg-start text-default">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2025 <a class="text-dark" href="https://facebook.com/wawansis14">Wawan Siswanto</a>
        </div>
        <!-- Copyright -->
      </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    @yield('scripts')
</body>

</html>
