@extends('layouts.app')
@section('title', 'Edit Perusahaan')
@section('content')
    <div class="container mt-3">
        <h3>Edit Perusahaan</h3>
        <hr>
        <form action="{{ route('subsidiaries.update', ['subsidiary' => $subsidiary->id]) }}" method="post">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') ?? $subsidiary->name }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="tagline">Tagline</label>
                <input type="text" id="tagline" name="tagline" value="{{ old('tagline') ?? $subsidiary->tagline }}"
                    class="form-control @error('tagline') is-invalid @enderror">
                @error('tagline')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="npwp">NPWP</label>
                <input type="text" id="npwp" name="npwp" value="{{ old('npwp') ?? $subsidiary->npwp }}"
                    class="form-control @error('tagline') is-invalid @enderror">
                @error('npwp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') ?? $subsidiary->email }}"
                    class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Phone</label>
                <input type="number" id="phone" name="phone" value="{{ old('tagline') ?? $subsidiary->phone }}"
                    class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <textarea class="form-control" id="address" rows="3" name="address">{{ old('address') ?? $subsidiary->address }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </form>
    </div>

@endsection
