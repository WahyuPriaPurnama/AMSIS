@extends('layouts.app')
@section('title', 'BOFI Live Streaming')
@section('menuCCTV', 'active')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script>
    const video = document.getElementById('video');
    if (Hls.isSupported()) {
        const hls = new Hls();
        hls.loadSource('stream.m3u8');
        hls.attachMedia(video);
    } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
        video.src = 'stream.m3u8';
    }
</script>
<div class="container">
    @component('components.card')
    @slot('header')
    BOFI Live Streaming
    @endslot

    <video id="video" controls autoplay style="width: 100%; max-width: 720px;"></video>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        if (Hls.isSupported()) {
            var hls = new Hls();
            hls.loadSource('{{ asset("stream/index.m3u8") }}');
            hls.attachMedia(document.getElementById('video'));
        } else {
            document.getElementById('video').src = '{{ asset("stream/index.m3u8") }}';
        }
    </script>
    @endcomponent
</div>

@endsection