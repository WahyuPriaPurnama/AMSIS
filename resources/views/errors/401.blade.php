@extends('layouts.app')
@section('title', 'Unauthorized')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                <div class="d-flex justify-content-between">
                    <h5>{{ __('Unauthorized Access') }}</h5>
                </div>
            @endslot
            <div class="text-center py-5">
                <img src="{{ Storage::url('logo/default-logo.png') }}" class="img-thumbnail mb-3" alt="">
                <h4 class="text-danger mb-3">{{ __('Anda tidak memiliki hak akses ke halaman ini.') }}</h4>
                <a href="{{ url('/') }}" class="btn btn-primary">{{ __('Kembali') }}</a>
            </div>
        @endcomponent
    </div>
@endsection
