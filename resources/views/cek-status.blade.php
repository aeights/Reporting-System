@extends('layouts.main')

@section('content')
    <div class="container-fluid text-center">
        <div class="container">
            <div class="card shadow bg-white mb-5">
                <div class="card-header bg-primary text-white fs-4">
                    Cek Status
                </div>
                <div class="card-body">
                    <form action="{{ url('/cek-status') }}" method="POST">
                        @csrf
                        <h5 class="card-title">Masukkan Id Ticket untuk mengecek status pengaduan</h5>
                        <input type="text" name="ticket_id" class="form-control text-center my-3"
                            id="exampleFormControlInput" placeholder="Id Ticket">
                        <button type="submit" class="btn btn-primary">Cek Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
