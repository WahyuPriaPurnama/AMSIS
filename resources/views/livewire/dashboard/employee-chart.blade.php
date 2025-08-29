<div>
    <canvas id="employeeChart"></canvas>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('employeeChart');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['AMS', 'ELN 1', 'ELN 2', 'BOFI', 'HAKA', 'RMM'],
                datasets: [{
                    label: 'Data',
                    data: [@js($ams), @js($eln1), @js($eln2), @js($bofi), @js($hk), @js($rmm)],
                    borderWidth: 1,
                    backgroundColor: ['#0000ff', '#daa520', '#daa520', '#0000ff', '#008000', '#ff00ff']
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</div>