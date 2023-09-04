@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Log Report <span style="float: right"></h5>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Ticket</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{ $log['properties']['attributes']['ticket_id'] }}</td>
                            <td>{{ $log['properties']['attributes']['title'] }}</td>
                            <td>{{ $log['properties']['attributes']['category_id'] }}</td>
                            <td>{{ $log['properties']['attributes']['status'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
