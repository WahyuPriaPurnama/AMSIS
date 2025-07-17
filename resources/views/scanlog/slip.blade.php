@extends('layouts.app')

@section('title', 'Slip Gaji')
@section('content')
<div class="container w-50 mt-3">
    @component('components.card')
    @slot('header')
    Slip Gaji
    @endslot
    @foreach($slips as $slip)

    {{$slip->tgl}}&emsp;&emsp; {{$slip->dk}} &emsp;&emsp;{{$slip->tgaji}}<br>
    @endforeach
    @endcomponent
</div>
@endsection