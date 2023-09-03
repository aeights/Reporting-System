@extends('layouts.main')

@section('content')
    <div class="container bg-white p-5 shadow rounded">
        <form action="{{ url('/pengaduan/store') }}" method="POST">
            @csrf
            <p class="fs-5">Personal Data</p>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleFormControlInput" placeholder="Name">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="phoneNumberInput" class="form-label">Phone number</label>
                <input type="text" name="phone_number" class="form-control" id="phoneNumberInput"
                    placeholder="Phone number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Identity Type</label>
                <input type="text" name="identity_type" class="form-control" id="exampleFormControlInput"
                    placeholder="Identity type">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Identity Number</label>
                <input type="text" name="identity_number" class="form-control" id="exampleFormControlInput"
                    placeholder="Identity number">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Place of Birth</label>
                <input type="text" name="pob" class="form-control" id="exampleFormControlInput"
                    placeholder="Place of birth">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Date of birth</label>
                <input type="date" name="dob" class="form-control" id="exampleFormControlInput"
                    placeholder="Date of birth">
            </div>
            <div class="mb-5">
                <label for="exampleFormControlInput" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="exampleFormControlInput"
                    placeholder="Address">
            </div>
            <p class="fs-5">Report Data</p>
            <div class="mb-3">
                <label for="exampleFormControlInput" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput"
                    placeholder="Report title">
            </div>
            <div class="mb-3">
              <label for="formSelect" class="form-label">Report Category</label>
              <select id="formSelect" name="category_id" class="form-select" aria-label="Report category">
                  <option selected hidden >Category</option>
                  @foreach ($category as $item)
                  <option value="{{ $item->id }}">{{ $item->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
