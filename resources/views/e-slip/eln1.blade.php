@extends('layouts.app')
@section('title', 'E-Slip ELN Malang')
@section('menuELN','active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                E-Slip ELN Malang
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>E-Slip</th>
                        </tr>
                    </thead>
                    <tbody>
                          
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
