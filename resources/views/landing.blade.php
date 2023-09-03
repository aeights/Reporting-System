@extends('layouts.main')

@section('content')
    <div class="container-fluid text-center">
        <h1 class="mb-3">Selamat Datang di Sistem Pengaduan</h1>
        <div class="container">
            <div class="card mb-3 shadow bg-white">
                <div class="card-header bg-primary text-white fs-4">
                    Pengaduan
                </div>
                <div class="card-body">
                    <h5 class="card-title">Ajukan pengaduan</h5>
                    <p class="card-text">Klik tombol pengaduan untuk mengajukan pengaduan</p>
                    <a href="{{ url('/pengaduan') }}" class="btn btn-primary">Pengaduan</a>
                </div>
            </div>

            <div class="card shadow bg-white">
                <div class="card-header bg-primary text-white fs-4">
                    Cek Status
                </div>
                <div class="card-body">
                    <h5 class="card-title">Cek status pengaduan</h5>
                    <p class="card-text">Klik tombol cek status untuk mengecek status pengaduan</p>
                    <a href="{{ url('/cek-status') }}" class="btn btn-primary">Cek Status</a>
                </div>
            </div>
        </div>
    </div>
@endsection
