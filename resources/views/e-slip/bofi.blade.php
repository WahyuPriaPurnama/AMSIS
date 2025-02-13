@extends('layouts.app')
@section('title', 'E-Slip BOFI')
@section('menuBOFI','active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                E-Slip BOFI
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
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
