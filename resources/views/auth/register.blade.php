@extends('layouts.main')

@section('content')
    <div class="container bg-white p-5 shadow rounded">
        <form action="{{ url('/register/process') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="mb-3">
                <label for="phoneNumberInput" class="form-label">Phone number</label>
                <input type="text" name="phone_number" class="form-control" id="phoneNumberInput" placeholder="Phone number">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
