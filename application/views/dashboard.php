<div class="content-wrapper container">
    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>
    <div class="page-content">
        <section class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Statistik Siswa</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" width="400" height="300"></canvas>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<!-- dashboard.php -->

<!-- Tambahkan elemen canvas untuk menampilkan chart -->

<!-- Tambahkan script JavaScript untuk menginisialisasi dan menggambar chart -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chartData = <?php echo json_encode($chart_data); ?>;

    var labels = chartData.map(function(item) {
        return item.nilai_huruf;
    });

    var data = chartData.map(function(item) {
        return item.jumlah;
    });

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Siswa',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    stepSize: 1
                }
            }
        }
    });
</script>
