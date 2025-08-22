@extends('layouts.app')
@section('title', 'Pengajuan Cuti')
@section('content')
    <div class="container">
        <div class="col-md-6 mx-auto">
            @component('components.card')
                @slot('header')
                    Pengajuan Cuti {{ Auth::user()->name }}
                @endslot
                <h1 x-data="{ message: 'I ❤️ Alpine' }" x-text="message"></h1>
                <div x-data="{ count: 0 }">
                    <button class="btn btn-primary" x-on:click="count++">Increment</button>
                    <button class="btn btn-secondary" x-on:click="count = 0">Reset</button>
                    <p>Count: </p>
                    <span class="badge bg-success" x-text="count"></span>
                </div>
                <div x-data="{ open: false }">
                    <button class="btn btn-danger" @click="open = !open">Toggle</button>
                    <p x-show="open">Halo, ini teks dari Alpine.js!</p>
                </div>
            @endcomponent
        </div>
    </div>
@endsection
