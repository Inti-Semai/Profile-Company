@extends('admin.layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Kartu Statistik Admin -->
    <div class="stats-grid">
        <!-- Produk Card -->
        <div class="stat-card">
            <div class="stat-icon customers">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <h3>Total Produk</h3>
                <div class="stat-value">{{ $totalProducts ?? 0 }}</div>
            </div>
        </div>
        <!-- Galeri Card -->
        <div class="stat-card">
            <div class="stat-icon orders">
                <i class="fas fa-images"></i>
            </div>
            <div class="stat-content">
                <h3>Total Galeri</h3>
                <div class="stat-value">{{ $totalGalleries ?? 0 }}</div>
            </div>
        </div>
        <!-- Info Perusahaan Card -->
        <div class="stat-card">
            <div class="stat-icon revenue">
                <i class="fas fa-building"></i>
            </div>
            <div class="stat-content">
                <h3>Info Perusahaan</h3>
                <div class="stat-value">{{ $totalCompanyInfo ?? 0 }}</div>
            </div>
        </div>
        <!-- Admin/User Card -->
        <div class="stat-card">
            <div class="stat-icon growth">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-content">
                <h3>Total Admin</h3>
                <div class="stat-value">{{ $totalAdmins ?? 0 }}</div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="charts-row">
        <!-- Bar Chart Produk & Galeri -->
        <div class="chart-card large">
            <div class="card-header">
                <h3>Statistik Produk & Galeri per Bulan</h3>
            </div>
            <div class="chart-container">
                <canvas id="produkGaleriChart"></canvas>
            </div>
        </div>
        <!-- Pie Chart Komposisi Produk -->
        <div class="chart-card small">
            <div class="card-header">
                <h3>Komposisi Produk</h3>
            </div>
            <div class="chart-container">
                <canvas id="pieProdukChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Statistik Lainnya -->
    <div class="statistics-card">
        <div class="card-header">
            <div>
                <h3>Statistik Lainnya</h3>
                <p class="card-subtitle">Data terkait aktivitas admin</p>
            </div>
        </div>
        <div class="chart-container">
            <canvas id="statisticsChart"></canvas>
        </div>
    </div>
</div>

@push('styles')
<style>
    .dashboard-container {
        max-width: 1400px;
        margin: 0 auto;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 24px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 20px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        transition: all 0.3s;
    }

    .stat-card:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: white;
    }

    /* WARNA HIJAU UNTUK CUSTOMERS */
    .stat-icon.customers {
        background: linear-gradient(135deg, #3B5B18, #31460B);
    }

    /* WARNA ORANGE UNTUK ORDERS */
    .stat-icon.orders {
        background: linear-gradient(135deg, #FF6B1E, #FB8B23);
    }

    /* WARNA HIJAU MUDA UNTUK REVENUE */
    .stat-icon.revenue {
        background: linear-gradient(135deg, #3B5B18, #A6B37D);
    }

    /* WARNA ORANGE-HIJAU UNTUK GROWTH */
    .stat-icon.growth {
        background: linear-gradient(135deg, #FB8B23, #A6B37D);
    }

    .stat-content {
        flex: 1;
    }

    .stat-content h3 {
        font-size: 14px;
        color: #6B7280;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 28px;
        font-weight: 700;
        color: #31460B;
        margin-bottom: 8px;
    }

    .stat-change {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        font-weight: 600;
    }

    .stat-change.positive {
        color: #3B5B18;
    }

    .stat-change.negative {
        color: #FF6B1E;
    }

    .charts-row {
        display: grid;
        grid-template-columns: 1.5fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }

    .chart-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .card-header h3 {
        font-size: 18px;
        font-weight: 600;
        color: #31460B;
    }

    .card-subtitle {
        font-size: 13px;
        color: #6B7280;
        margin-top: 4px;
    }

    .menu-btn {
        background: none;
        border: none;
        color: #9CA3AF;
        cursor: pointer;
        padding: 8px;
        border-radius: 6px;
        transition: all 0.3s;
    }

    .menu-btn:hover {
        background-color: #f8f9fa;
        color: #3B5B18;
    }

    .chart-container {
        position: relative;
        height: 300px;
    }

    .target-container {
        text-align: center;
    }

    .target-text {
        font-size: 14px;
        color: #6B7280;
        margin-bottom: 30px;
    }

    .progress-circle {
        position: relative;
        display: inline-block;
        margin-bottom: 20px;
    }

    .progress-value {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .percentage {
        font-size: 32px;
        font-weight: 700;
        color: #31460B;
    }

    .growth {
        font-size: 14px;
        color: #FF6B1E;
        font-weight: 600;
    }

    .earnings-text {
        font-size: 13px;
        color: #6B7280;
        line-height: 1.6;
        margin-bottom: 30px;
        padding: 0 20px;
    }

    .target-stats {
        display: flex;
        justify-content: space-around;
        padding-top: 20px;
        border-top: 1px solid #E5E7EB;
    }

    .target-stat {
        text-align: center;
    }

    .stat-label {
        font-size: 13px;
        color: #6B7280;
        margin-bottom: 8px;
    }

    .stat-amount {
        font-size: 16px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
    }

    .stat-amount.red {
        color: #FF6B1E;
    }

    .stat-amount.green {
        color: #3B5B18;
    }

    .statistics-card {
        background: white;
        padding: 24px;
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
    }

    .stats-tabs {
        display: flex;
        gap: 8px;
    }

    .tab-btn {
        padding: 8px 16px;
        border: none;
        background: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #6B7280;
        cursor: pointer;
        transition: all 0.3s;
    }

    .tab-btn:hover {
        background-color: #f8f9fa;
    }

    .tab-btn.active {
        background-color: rgba(59, 91, 24, 0.1);
        color: #3B5B18;
    }

    .date-range {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        background-color: #f8f9fa;
        border-radius: 8px;
        font-size: 14px;
        color: #6B7280;
        cursor: pointer;
    }

    .date-range:hover {
        background-color: rgba(59, 91, 24, 0.05);
        color: #3B5B18;
    }

    @media (max-width: 1024px) {
        .dashboard-container {
            padding: 0 8px;
        }
        .charts-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 0 4px;
        }
        .stats-grid {
            grid-template-columns: 1fr;
            gap: 14px;
        }
        .stat-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
            padding: 16px;
        }
        .stat-icon {
            width: 44px;
            height: 44px;
            font-size: 18px;
        }
        .stat-content h3 {
            font-size: 13px;
        }
        .stat-value {
            font-size: 22px;
        }
        .charts-row {
            gap: 14px;
        }
        .chart-card {
            padding: 14px;
        }
        .card-header {
            margin-bottom: 12px;
        }
        .card-header h3 {
            font-size: 15px;
        }
        .chart-container {
            height: 220px;
        }
        .statistics-card {
            padding: 14px;
        }
    }

    @media (max-width: 480px) {
        .dashboard-container {
            padding: 0 2px;
        }
        .stat-card {
            padding: 10px;
        }
        .stat-icon {
            width: 36px;
            height: 36px;
            font-size: 15px;
        }
        .stat-content h3 {
            font-size: 12px;
        }
        .stat-value {
            font-size: 16px;
        }
        .chart-card {
            padding: 8px;
        }
        .card-header h3 {
            font-size: 13px;
        }
        .chart-container {
            height: 140px;
        }
        .statistics-card {
            padding: 8px;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart Produk & Galeri per Bulan
    const produkGaleriCtx = document.getElementById('produkGaleriChart').getContext('2d');
    new Chart(produkGaleriCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($months ?? ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"]) !!},
            datasets: [
                {
                    label: 'Produk',
                    data: {!! json_encode($produkPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: '#3B5B18',
                    borderRadius: 8,
                    barThickness: 24
                },
                {
                    label: 'Galeri',
                    data: {!! json_encode($galeriPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: '#FB8B23',
                    borderRadius: 8,
                    barThickness: 24
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Pie Chart Komposisi Produk
    const pieProdukCtx = document.getElementById('pieProdukChart').getContext('2d');
    new Chart(pieProdukCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($pieLabels ?? ["Aktif", "Tidak Aktif"]) !!},
            datasets: [{
                data: {!! json_encode($pieData ?? [0,0]) !!},
                backgroundColor: [
                    '#3B5B18',
                    '#A6B37D'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true
                }
            }
        }
    });

    // Statistik Lainnya (dummy)
    const statisticsCtx = document.getElementById('statisticsChart').getContext('2d');
    new Chart(statisticsCtx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Aktivitas Admin',
                data: [12, 18, 15, 20, 17, 25, 22],
                borderColor: '#3B5B18',
                backgroundColor: 'rgba(59, 91, 24, 0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        borderDash: [5, 5]
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
