@extends('layout.master')
@section('title', 'AMS Information Systems')
@section('content')
    <div class="container mt-3">
        <h2 class="my-4">Form Login</h2>
        <hr>
        @if (session()->has('alert'))
            <div class="alert alert-info w-50">
                {{ session()->get('alert') }}
            </div>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <div class="mb-3 ">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control w-50" id="username" name="username" value="{{ old('username') }}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-danger my-2">Login</button>
        </form>
    </div>
@endsection
