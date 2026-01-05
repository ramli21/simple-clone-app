@extends('layouts.dashboard')
@section('title-page')
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h4 mb-0">Overview</h2>
        <div class="btn-group">
            <button class="btn btn-outline-secondary btn-sm">7 Hari</button>
            <button class="btn btn-outline-secondary btn-sm">30 Hari</button>
            <button class="btn btn-outline-secondary btn-sm">90 Hari</button>
        </div>
    </div>
@endsection
@section('content')
    <!-- KPI Cards -->
    <div class="row g-3">
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Total Pengunjung</h6>
                    <div class="h3 mb-2">12.345</div>
                    <span class="badge bg-success">+8.2% WoW</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Bounce Rate</h6>
                    <div class="h3 mb-2">47%</div>
                    <span class="badge bg-danger">+2.1%</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">Durasi Sesi</h6>
                    <div class="h3 mb-2">3m 25s</div>
                    <span class="badge bg-success">+12s</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="text-secondary mb-1">CTR Organik</h6>
                    <div class="h3 mb-2">4.9%</div>
                    <span class="badge bg-info text-dark">Stabil</span>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO Summary -->
    <div class="row g-3 mt-1">
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    Audit SEO Sederhana
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Page indexed</span>
                            <span class="badge bg-success">98%</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Core Web Vitals (LCP)</span>
                            <span class="badge bg-info text-dark">Baik</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Broken links</span>
                            <span class="badge bg-warning text-dark">12</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Meta title/desc lengkap</span>
                            <span class="badge bg-success">92%</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Traffic Line Chart -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    Trafik Pengunjung (7 Hari)
                </div>
                <div class="card-body">
                    <div id="trafficChart"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sources & Rankings -->
    <div class="row g-3 mt-1">
        <!-- Traffic Sources Pie -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    Sumber Trafik
                </div>
                <div class="card-body">
                    <div id="sourceChart"></div>
                    <div class="mt-3">
                        <span class="badge bg-success me-2">Organik</span>
                        <span class="badge bg-primary me-2">Referral</span>
                        <span class="badge bg-warning text-dark me-2">Sosial</span>
                        <span class="badge bg-secondary">Direct</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Simple Rankings -->
        <div class="col-lg-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    Kata Kunci Utama
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm align-middle">
                            <thead>
                                <tr>
                                    <th>Keyword</th>
                                    <th>Posisi</th>
                                    <th>Volume</th>
                                    <th>CTR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>sepatu lari pria</td>
                                    <td>#3</td>
                                    <td>6.6k</td>
                                    <td>5.2%</td>
                                </tr>
                                <tr>
                                    <td>running shoes</td>
                                    <td>#8</td>
                                    <td>12k</td>
                                    <td>3.8%</td>
                                </tr>
                                <tr>
                                    <td>sepatu olahraga</td>
                                    <td>#12</td>
                                    <td>9.1k</td>
                                    <td>2.9%</td>
                                </tr>
                                <tr>
                                    <td>diskon sepatu</td>
                                    <td>#15</td>
                                    <td>3.2k</td>
                                    <td>4.1%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <small class="text-secondary">Data contoh untuk tampilan—hubungkan ke API/DB untuk live
                        data.</small>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Line chart: Visitors (last 7 days)
        const optionsLine = {
            chart: {
                type: 'line',
                height: 280,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Pengunjung',
                data: [1200, 1500, 1800, 1700, 2000, 2200, 2500]
            }],
            xaxis: {
                categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                labels: {
                    style: {
                        colors: '#6c757d'
                    }
                }
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            colors: ['#0dcaf0'],
            markers: {
                size: 4,
                colors: ['#0dcaf0'],
                strokeColors: '#0dcaf0'
            },
            grid: {
                borderColor: '#e9ecef'
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#6c757d'
                    }
                }
            }
        };
        new ApexCharts(document.querySelector("#trafficChart"), optionsLine).render();

        // Pie chart: Traffic sources
        const optionsPie = {
            chart: {
                type: 'donut',
                height: 300
            },
            series: [44, 28, 18, 10],
            labels: ['Organik', 'Referral', 'Sosial', 'Direct'],
            colors: ['#198754', '#0d6efd', '#ffc107', '#6c757d'],
            legend: {
                position: 'bottom'
            },
            dataLabels: {
                enabled: true
            }
        };
        new ApexCharts(document.querySelector("#sourceChart"), optionsPie).render();
    </script>
@endsection
