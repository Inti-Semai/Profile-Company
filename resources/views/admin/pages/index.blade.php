@extends('admin.layouts.app')

@section('content')
<div class="dashboard-container">
    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Customers Card -->
        <div class="stat-card">
            <div class="stat-icon customers">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-content">
                <h3>Customers</h3>
                <div class="stat-value">3,782</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>11.01%</span>
                </div>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="stat-card">
            <div class="stat-icon orders">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-content">
                <h3>Orders</h3>
                <div class="stat-value">5,359</div>
                <div class="stat-change negative">
                    <i class="fas fa-arrow-down"></i>
                    <span>9.05%</span>
                </div>
            </div>
        </div>

        <!-- Revenue Card -->
        <div class="stat-card">
            <div class="stat-icon revenue">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <div class="stat-content">
                <h3>Revenue</h3>
                <div class="stat-value">$45,289</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>18.47%</span>
                </div>
            </div>
        </div>

        <!-- Growth Card -->
        <div class="stat-card">
            <div class="stat-icon growth">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="stat-content">
                <h3>Growth</h3>
                <div class="stat-value">+24.5%</div>
                <div class="stat-change positive">
                    <i class="fas fa-arrow-up"></i>
                    <span>12.33%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="charts-row">
        <!-- Monthly Sales Chart -->
        <div class="chart-card large">
            <div class="card-header">
                <h3>Monthly Sales</h3>
                <button class="menu-btn">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <div class="chart-container">
                <canvas id="monthlySalesChart"></canvas>
            </div>
        </div>

        <!-- Monthly Target -->
        <div class="chart-card small">
            <div class="card-header">
                <h3>Monthly Target</h3>
                <button class="menu-btn">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
            </div>
            <div class="target-container">
                <div class="target-text">Target you've set for each month</div>
                <div class="progress-circle">
                    <svg width="200" height="200" viewBox="0 0 200 200">
                        <circle cx="100" cy="100" r="85" fill="none" stroke="#E5E7EB" stroke-width="15"/>
                        <circle cx="100" cy="100" r="85" fill="none" stroke="url(#gradient)" stroke-width="15" 
                                stroke-dasharray="534" stroke-dashoffset="133" stroke-linecap="round" 
                                transform="rotate(-90 100 100)"/>
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#FF6B1E;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#FB8B23;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                    </svg>
                    <div class="progress-value">
                        <div class="percentage">75.55%</div>
                        <div class="growth">+10%</div>
                    </div>
                </div>
                <div class="earnings-text">You earn $3287 today, it's higher than last month. Keep up your good work!</div>
                
                <div class="target-stats">
                    <div class="target-stat">
                        <div class="stat-label">Target</div>
                        <div class="stat-amount red">$20K <i class="fas fa-arrow-down"></i></div>
                    </div>
                    <div class="target-stat">
                        <div class="stat-label">Revenue</div>
                        <div class="stat-amount green">$20K <i class="fas fa-arrow-up"></i></div>
                    </div>
                    <div class="target-stat">
                        <div class="stat-label">Today</div>
                        <div class="stat-amount green">$20K <i class="fas fa-arrow-up"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Chart -->
    <div class="statistics-card">
        <div class="card-header">
            <div>
                <h3>Statistics</h3>
                <p class="card-subtitle">Target you've set for each month</p>
            </div>
            <div class="stats-tabs">
                <button class="tab-btn active">Overview</button>
                <button class="tab-btn">Sales</button>
                <button class="tab-btn">Revenue</button>
            </div>
            <div class="date-range">
                <i class="fas fa-calendar"></i>
                <span>Sep 30, 2025 - Oct 6, 2025</span>
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
        .charts-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Sales Chart
    const monthlySalesCtx = document.getElementById('monthlySalesChart').getContext('2d');
    new Chart(monthlySalesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sales',
                data: [150, 380, 210, 310, 180, 280, 320, 120, 280, 370, 300, 180],
                backgroundColor: '#3B5B18',
                borderRadius: 8,
                barThickness: 30
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

    // Statistics Chart
    const statisticsCtx = document.getElementById('statisticsChart').getContext('2d');
    new Chart(statisticsCtx, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
            datasets: [{
                label: 'This Week',
                data: [120, 180, 150, 200, 170, 250, 220],
                borderColor: '#3B5B18',
                backgroundColor: 'rgba(59, 91, 24, 0.1)',
                fill: true,
                tension: 0.4,
                borderWidth: 3
            }, {
                label: 'Last Week',
                data: [100, 150, 130, 180, 140, 200, 180],
                borderColor: '#A6B37D',
                backgroundColor: 'rgba(166, 179, 125, 0.1)',
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