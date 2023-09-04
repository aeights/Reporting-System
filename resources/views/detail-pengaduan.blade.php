@extends('layouts.main')

@section('content')
    <div class="card shadow">
        <div class="card-body text-start px-3">
            <form action="{{ url('/dashboard/report/edit') }}" method="POST">
                @csrf
                <input type="hidden" value="{{ $report->id }}" name="id">
                <div class="mb-3">
                    <label for="formSelect" class="form-label">Change Status</label>
                    <select id="formSelect" name="status" class="form-select" aria-label="Change Status">
                        <option selected hidden>Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Proses Administratif">Proses Administratif</option>
                        <option value="Proses Penanganan">Proses Penanganan</option>
                        <option value="Selesai Ditangani">Selesai Ditangani</option>
                        <option value="Laporan Ditolak">Laporan Ditolak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <h5 class="card-title text-center mb-3 fw-bold">Report Detail</h5>
            <p class="card-text">Ticket Id: {{ $report->ticket_id }}</p>
            <p class="card-text">Status: {{ $report->status }}</p>
            <p class="card-text">Name: {{ $reporter->name }}</p>
            <p class="card-text">Email: {{ $reporter->email }}</p>
            <p class="card-text">Phone Number: {{ $reporter->phone_number }}</p>
            <p class="card-text">Identity Type: {{ $reporter->identity_type }}</p>
            <p class="card-text">Identity Number: {{ $reporter->identity_number }}</p>
            <p class="card-text">Place of Birth, Date of Birth: {{ $reporter->pob }}, {{ $reporter->dob }}</p>
            <p class="card-text">Address: {{ $reporter->address }}</p>
            <p class="card-text">Title: {{ $report->title }}</p>
            <p class="card-text">Category: {{ $report->category_id }}</p>
            <p class="card-text">Description: {{ $report->description }}</p>
            <div><img src="" alt=""></div>
        </div>
    </div>
@endsection
