@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Halo '.ucfirst(Auth::user()->name).', Selamat Datang!')}}
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-header">
            <div class="text text-center">
            <h3>MENU</h3>
            </div>
        </div>
        <div class="card-body">
            <a class="btn btn-primary" href="/pengadaan_dashboard/po" data-bs-toggle="tooltip" data-bs-placement="top" title="klik di sini untuk melihat daftar PO">List PO</a>
        </div>
    </div>
</div>
@endsection
