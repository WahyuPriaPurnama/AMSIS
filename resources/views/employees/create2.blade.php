@extends('layouts.app')
@section('title', 'Input Data Karyawan')
@section('menuEmployees', 'active')
@section('content')
    <div class="container mt-3">
        @component('components.card')
            @slot('header')
                INPUT DATA KARYAWAN
            @endslot
            <div x-data="{ open: false }">
                <button class="btn btn-primary" @click="open = !open">Toggle</button>
                <p x-show="open">Alpine aktif!</p>
            </div>
            <div class="row">
                <div class="col">
                    <x-autocomplete-field label="Divisi" name="division" :items="$divisions" />
                </div>
                <div class="col">
                    <x-autocomplete-field label="Departemen" name="department" :items="$departments" />
                </div>
                <div class="col">
                    <x-autocomplete-field label="Seksi" name="section" :items="$sections" />
                </div>
                <div class="col">
                    <x-autocomplete-field label="Jabatan" name="position" :items="$positions" />
                </div>
            </div>
        @endcomponent
    </div>
@endsection

