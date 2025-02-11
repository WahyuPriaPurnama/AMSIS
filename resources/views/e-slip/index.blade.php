@extends('layouts.app')
@section('title', 'E-Slip AMS Group')
@section('menuEslip', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                E-Slip AMS Group
            @endslot
            <div class="table table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NAMA</th>
                            <th>PLANT</th>
                            <th>E-Slip</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($eslips as $eslip )
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endcomponent
    </div>
@endsection
