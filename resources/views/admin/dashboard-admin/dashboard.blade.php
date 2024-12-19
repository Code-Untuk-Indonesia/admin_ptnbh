@extends('admin-template.navbar-footer')
@section('content')
    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">

                <h1 class="app-page-title">Dashboard</h1>

                <div class="row g-4 mb-4">
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-newspaper mr-2"></i>
                                    <h4 class="stats-type mb-0">Total Berita</h4>
                                </div>
                                <div class="stats-figure">{{ $totalBerita }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-bullhorn mr-2"></i>
                                    <h4 class="stats-type mb-0">Total Pengumuman</h4>
                                </div>
                                <div class="stats-figure">{{ $totalPengumuman }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-video mr-2"></i>
                                    <h4 class="stats-type mb-0">Total Video</h4>
                                </div>
                                <div class="stats-figure">{{ $totalVideo }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-images mr-2"></i>
                                    <h4 class="stats-type mb-0">Total Album</h4>
                                </div>
                                <div class="stats-figure">{{ $totalAlbum }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <h4 class="stats-type mb-1">Total Pengunjung</h4>
                                <div class="stats-figure">{{ $totalVisits }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                    <div class="col-6 col-lg-3">
                        <div class="app-card app-card-stat shadow-sm h-100">
                            <div class="app-card-body p-3 p-lg-4">
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-bullhorn mr-2"></i>
                                    <h4 class="stats-type mb-0">Total Agenda</h4>
                                </div>
                                <div class="stats-figure">{{ $totalAgenda }}</div>
                            </div><!--//app-card-body-->
                            <a class="app-card-link-mask" href="#"></a>
                        </div><!--//app-card-->
                    </div><!--//col-->
                </div><!--//row-->
                <div class="col-12 col-lg-6">
                    <div class="app-card app-card-chart h-100 shadow-sm">
                        <div class="app-card-header p-3">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <h4 class="app-card-title">Statistik Pengunjung</h4>
                                </div><!--//col-->
                                <div class="col-auto">

                                </div><!--//col-->
                            </div><!--//row-->
                        </div><!--//app-card-header-->
                        <div class="app-card-body p-3 p-lg-4">
                            <div class="mb-3 d-flex">
                                <select id="time-period" class="form-select form-select-sm ms-auto d-inline-flex w-auto">
                                    <option value="day" selected>Per Day</option>
                                    <option value="month">Per Month</option>
                                    <option value="year">Per Year</option>
                                </select>
                            </div>
                            <div class="chart-container">
                                <canvas id="canvas-linechart"></canvas>
                            </div>
                        </div><!--//app-card-body-->
                    </div><!--//app-card-->
                </div><!--//col-->

            </div><!--//container-fluid-->
        </div><!--//app-content-->

        <footer class="app-footer">
            <div class="container text-center py-3">
                <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <h5>@Copyright Admin PTNBH UNTAN </h5>

            </div>
        </footer><!--//app-footer-->

    </div><!--//app-wrapper-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Add Chart.js CDN -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('canvas-linechart').getContext('2d');
            let visitorChart;

            // Fetch data and update the chart
            function fetchChartData(period = 'day') {
                fetch(`/admin/visitors?period=${period}`)
                    .then(response => response.json())
                    .then(data => {
                        const labels = data.map(item => item.date);
                        const counts = data.map(item => item.count);

                        if (visitorChart) {
                            visitorChart.destroy();
                        }

                        visitorChart = new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: labels,
                                datasets: [{
                                    label: 'Banyaknya Pengunjung',
                                    data: counts,
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    fill: true
                                }]
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    x: {
                                        title: {
                                            display: true,
                                            text: period === 'day' ? 'Date' : (period === 'month' ? 'Month' : 'Year')
                                        }
                                    },
                                    y: {
                                        title: {
                                            display: true,
                                            text: 'Banyaknya Pengunjung'
                                        },
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                    });
            }

            // Initial load with default period
            fetchChartData('day');

            // Update chart when the time period changes
            document.getElementById('time-period').addEventListener('change', function () {
                fetchChartData(this.value);
            });
        });
    </script>
@endsection
