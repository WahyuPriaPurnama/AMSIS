@extends('layouts.app')
@section('title', 'BOFI Live Streaming')
@section('menuCCTV', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                BOFI Live Streaming
            @endslot
            <div class="text-center">
                <iframe width='640' height='480' src='https://rtsp.me/embed/5NK4Ysi7/' frameborder='0' allowfullscreen></iframe>
            </div>
        @endcomponent
    </div>

@endsection
