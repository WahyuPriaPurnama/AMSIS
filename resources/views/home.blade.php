@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                GRAFIK JUMLAH KARYAWAN PER PLANT
            </div>
            <div class="card-body">
                <div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

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
