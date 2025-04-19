@extends('layouts.app')

@section('title', 'Curriculum Vitae')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section('content')
    <h1>Curriculum Vitae</h1>

    <!-- Informasi Pribadi -->
    <div class="section">
        <h2>Informasi Pribadi</h2>
        <p><strong>Nama:</strong> Wawan Siswanto</p>
        <p><strong>Email:</strong> siswanto.zone@gmail.com</p>
        <p><strong>Telepon:</strong> +62 838 2478 7601</p>
        <p><strong>Alamat:</strong> Jl. Manunggal Pekandangan Indramayu Jawa Barat</p>
    </div>

    <!-- Pendidikan -->
    <div class="section">
        <h2>Pendidikan</h2>
        <p><strong>AMIK Purnama Niaga Indramayu</strong> - Manajemen Informatika (2016-2019)</p>
        <p><strong>SMK Negeri 1 Indramayu</strong> - Multimedia (2009-2012)</p>
    </div>

    <!-- Pengalaman Kerja -->
    <div class="section">
        <h2>Pengalaman Kerja</h2>
        <p><strong>Dinas Tenaga Kerja Kabupaten Indramayu</strong> - Pranata Komputer (2022-Sekarang)</p>
        <ul>
            <li>Mengembangkan aplikasi web menggunakan Laravel.</li>
            <li>Membuat API untuk integrasi dengan sistem lain.</li>
        </ul>
        <p><strong>SMK Negeri 1 Indramayu</strong> - Staff IT (2012-2022)</p>
        <ul>
            <li>Membantu pengembangan frontend menggunakan Vue.js.</li>
            <li>Melakukan testing dan debugging aplikasi.</li>
        </ul>
    </div>

    <!-- Keahlian -->
    <div class="section">
        <h2>Keahlian</h2>
        <ul>
            <li>PHP (Laravel)</li>
            <li>JavaScript (Vue.js, React)</li>
            <li>HTML, CSS, Bootstrap</li>
            <li>MySQL, PostgreSQL</li>
            <li>Git & Version Control</li>
        </ul>
    </div>
@endsection