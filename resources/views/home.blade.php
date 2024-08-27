@extends('layouts.app')

@section('content')
<style>
    div{
        color: blue,red,gold,green,orange
    }
</style>
<div class="container">
    <div>
        <canvas id="myChart"></canvas>
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
              data: [{!!$ams!!},{!!$eln1!!},{!!$eln2!!},{!!$bofi!!},{!!$hk!!},{!!$rmm!!}],
              borderWidth: 1,
              backgroundColor: ['#36a2eb','#fe6383','#4ac0c0','#ff9f40','#9966ff','#ffcc56']
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
