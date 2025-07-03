@extends('layouts.app')
@section('title', 'BOFI Live Streaming')
@section('menuCCTV', 'active')
@section('content')

<div class="container">
    <style>
        .video-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .video-item {
            background: #f8f8f8;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .video-item h4 {
            margin-bottom: 10px;
            text-align: center;
        }

        video {
            width: 100%;
            border-radius: 4px;
        }
    </style>


    @component('components.card')
    @slot('header')
    BOFI Live Streaming
    @endslot

    <div class="video-grid">
        @foreach (['cam1', 'cam2', 'cam3','cam4','cam5','cam6','cam7','cam8'] as $cam)

        <div class="video-item">
            <h4>{{ strtoupper($cam) }}</h4>
            <video id="{{ $cam }}" controls autoplay muted></video>
        </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
    <script>
        const cams = ['cam1', 'cam2', 'cam3', 'cam4', 'cam5', 'cam6','cam7', 'cam8'];
        cams.forEach(function(id) {
            const video = document.getElementById(id);
            const source = `{{ asset('stream') }}/${id}/index.m3u8`;

            if (Hls.isSupported()) {
                const hls = new Hls();
                hls.loadSource(source);
                hls.attachMedia(video);
            } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = source;
            }
        });
    </script>

    @endcomponent
</div>

@endsection