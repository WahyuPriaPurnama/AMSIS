@extends('layouts.app')
@section('title', 'BOFI Live Streaming')
@section('menuCCTV', 'active')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                BOFI Live Streaming
            @endslot
            
            <div class="embed-responsive embed-responsive-16by9 text-center">
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/kBGhz7Ai/"' frameborder='0' allowfullscreen></iframe>
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/a9i7zSzf/' frameborder='0' allowfullscreen></iframe>
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/TGEt73fD/' frameborder='0' allowfullscreen></iframe>
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/5NK4Ysi7/' frameborder='0' allowfullscreen></iframe>
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/byEdirBR/' frameborder='0' allowfullscreen></iframe>
                <iframe class="embed-responsive-item" src='https://rtsp.me/embed/YGNZQife/' frameborder='0' allowfullscreen></iframe>
            </div>
        @endcomponent
    </div>

@endsection
