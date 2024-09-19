@extends('layouts.app')
@section('title', 'Edit Perusahaan')
@section('menuSubsidiaries', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                Edit {{ $subsidiary->name }}
            @endslot
            <form action="{{ route('subsidiaries.update', $subsidiary->id) }}" method="post" enctype="multipart/form-data">
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
                    <input type="text" id="phone" name="phone" value="{{ old('phone') ?? $subsidiary->phone }}"
                        class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-8">
                        <label class="form-label" for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" >{{ $subsidiary->address }}</textarea>
                    </div>
                    <div class="col-4">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" id="" class="form-control"
                            accept="image/png, image/jpeg, image/jpg">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </form>
        @endcomponent
    </div>

@endsection
