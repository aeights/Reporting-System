@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Report Tracker <span style="float: right"></h5>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Report id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Note</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $item)
                        <tr>
                            <td>{{ $item->user_id }}</td>
                            <td>{{ $item->report_id }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->note }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
