@extends('layouts.dashboard')
@section('title-page')
    <!-- Header dengan Filter -->
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard Report</h1>
        <div>
            <form method="GET" action="{{ route('admin.dashboard') }}" class="d-inline-block">
                @csrf
                <select name="period" onchange="this.form.submit()" class="form-select form-select-sm">
                    <option value="7" {{ $period == 7 ? 'selected' : '' }}>Last 7 Days</option>
                    <option value="30" {{ $period == 30 ? 'selected' : '' }}>Last 30 Days</option>
                </select>
            </form>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
@section('content')
    <!-- Kartu Ringkasan -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Total Inquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalInquiries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-success text-uppercase mb-1">New Inquiries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newInquiries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope-open-text fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-info text-uppercase mb-1">Active Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalServices }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Contacted</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $contactedInquiries }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-phone fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Grafik Tren dan Tabel Aktivitas -->
    <div class="row">
        <!-- Grafik Tren -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Inquiries Trend (Last {{ $period }} Days)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="inquiryTrendChart" style="height: 530px"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Aktivitas Terkini -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Inquiries</h6>
                </div>
                <div class="card-body">
                    @forelse($recentInquiries as $inquiry)
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>{{ $inquiry->name }}</strong>
                                <span
                                    class="badge bg-{{ $inquiry->status == 'new' ? 'primary' : ($inquiry->status == 'contacted' ? 'info' : 'secondary') }}">
                                    {{ ucfirst($inquiry->status) }}
                                </span>
                            </div>
                            <p class="text-muted mb-1">{{ Str::limit($inquiry->subject, 30) }}</p>
                            <small class="text-muted">{{ $inquiry->created_at->diffForHumans() }}</small>
                        </div>
                        <hr>
                    @empty
                        <p class="text-muted">No recent inquiries.</p>
                    @endforelse
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm btn-primary">View All
                            Inquiries</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari Laravel di-encode ke JSON
            const chartLabels = @json($chartLabels);
            const chartData = @json($chartData);

            const ctx = document.getElementById('inquiryTrendChart').getContext('2d');
            const inquiryTrendChart = new Chart(ctx, {
                type: 'line', // Tipe grafik garis
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Number of Inquiries',
                        data: chartData,
                        lineTension: 0.1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                        fill: true,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1 // Pastikan sumbu Y hanya menampilkan bilangan bulat
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 12
                            }
                        }
                    }
                }
            });
        });
    </script>
@endpush
