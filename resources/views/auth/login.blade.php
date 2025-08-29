@extends('layouts.app')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <livewire:auth.login-form />
            </div>
        </div>
    </div>
@endsection
