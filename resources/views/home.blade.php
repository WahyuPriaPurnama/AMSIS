@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        @component('components.card')
            @slot('header')
                <div class="d-flex justify-content-between">
                    JUMLAH KARYAWAN
                    @if ($jam = Carbon\Carbon::now()->format('H:m'))
                        @if ($jam <= '11:00')
                            <div>Selamat Pagi</div>
                        @elseif($jam <= '15:00')
                            <div>Selamat Siang</div>
                        @elseif($jam <= '18:00')
                            <div>Selamat Sore</div>
                        @elseif($jam <= '23:59')
                            <div>Selamat Malam</div>
                        @endif
                    @endif
                </div>
            @endslot

            <div>
                <canvas id="myChart"></canvas>
            </div>
        @endcomponent

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            const ctx = document.getElementById('myChart');

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['AMS', 'ELN 1', 'ELN 2', 'BOFI', 'HAKA', 'RMM'],
                    datasets: [{
                        label: 'Data',
                        data: [{!! $ams !!}, {!! $eln1 !!}, {!! $eln2 !!},
                            {!! $bofi !!}, {!! $hk !!}, {!! $rmm !!}
                        ],
                        borderWidth: 1,
                        backgroundColor: ['#36a2eb', '#fe6383', '#4ac0c0', '#ff9f40', '#9966ff', '#ffcc56']
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

    </div>
@endsection
