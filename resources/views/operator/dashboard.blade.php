@extends('layouts.main')

@section('content')
    <a href="{{ Auth::logout() }}">Logout</a>
@endsection