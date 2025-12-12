<?php include_once("views/layouts/header.php"); ?>

<div class="page-heading">
    <h3 class="mb-4">Hệ thống AE STORE</h3>
</div>

<div class="page-content">

    <div class="row mb-4">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Đơn hàng</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($countDonHang) ?></h4>
                </div>
                <div class="stats-icon" style="background: rgba(13, 202, 240, 0.2); color: #0dcaf0;"><i class="bi bi-cart-check"></i></div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Sản phẩm</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($countSanPham) ?></h4>
                </div>
                <div class="stats-icon" style="background: rgba(255, 193, 7, 0.2); color: #ffc107;"><i class="bi bi-phone"></i></div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Thành viên</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($countUser) ?></h4>
                </div>
                <div class="stats-icon" style="background: rgba(255, 46, 99, 0.2); color: #ff2e63;"><i class="bi bi-people-fill"></i></div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Doanh thu năm</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($doanhThuNam) ?> ₫</h4>
                </div>
                <div class="stats-icon" style="background: rgba(25, 135, 84, 0.2); color: #198754;"><i class="bi bi-cash-stack"></i></div>
            </div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-6 col-lg-6 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Doanh thu (Tháng)</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($doanhThuThang) ?> ₫</h4>
                    <span style="font-size: 0.8rem; color: #a0aec0;">
                        Hôm nay: <b style="color: #ff2e63;"><?= number_format($doanhThuHomNay) ?> ₫</b>
                    </span>
                </div>
                <div class="stats-icon" style="background: rgba(25, 135, 84, 0.2); color: #198754;"><i class="bi bi-cash-stack"></i></div>
            </div>
        </div>
        <div class="col-6 col-lg-6 col-md-6">
            <div class="stats-card">
                <div>
                    <h6 class="text-muted font-semibold">Tổng doanh thu</h6>
                    <h4 class="font-extrabold mb-0" style="color:#fff"><?= number_format($tongDoanhThu) ?> ₫</h4>
                    <span style="font-size: 0.8rem; color: #a0aec0;">
                        Hôm nay: <b style="color: #ff2e63;"><?= number_format($doanhThuHomNay) ?> ₫</b>
                    </span>
                </div>
                <div class="stats-icon" style="background: rgba(25, 135, 84, 0.2); color: #198754;"><i class="bi bi-cash-stack"></i></div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: #1c1f2b; color: #fff;">
                <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
                    <h4 style="color: #fff;">Biểu đồ doanh thu 1 năm</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChartYear" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <div class="card" style="background-color: #1c1f2b; color: #fff;">
                <div class="card-header" style="background-color: #1c1f2b; border-bottom: 1px solid #3a3f50;">
                    <h4 style="color: #fff;">Biểu đồ doanh thu 1 tháng</h4>
                </div>
                <div class="card-body">
                    <canvas id="revenueChartMonth" style="height: 350px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mb-4" style="border-left: 5px solid #ff2e63; padding-left: 15px;">Team AE Store</h4>
    <div class="row">
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="member-card">
                <img src="image/imgAdmin/mthuan.jpg" class="member-img">
                <h5 class="member-name">Minh Thuận</h5>
                <span class="role-badge">Leader / Backend</span>
                <p class="member-task">Quản lý dự án...</p>
                <div class="social-links"><a href="#" target="_blank"><i class="bi bi-facebook"></i></a></div>
            </div>
        </div>
    </div>
</div>

<?php include_once("views/layouts/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // --- Common Chart Options ---
    const commonOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                labels: {
                    color: '#ffffff'
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    color: '#2a2f40'
                },
                ticks: {
                    color: '#a0aec0'
                }
            },
            x: {
                grid: {
                    color: '#2a2f40'
                },
                ticks: {
                    color: '#a0aec0'
                }
            }
        }
    };

    // --- 1. Year Chart (Bar Chart) ---
    // Ensure $jsonLabels1Year and $jsonValues1Year are passed from controller
    const ctxYear = document.getElementById('revenueChartYear').getContext('2d');
    new Chart(ctxYear, {
        type: 'bar',
        data: {
            labels: <?= isset($jsonLabels1Year) ? $jsonLabels1Year : '[]' ?>,
            datasets: [{
                label: 'Doanh thu Tháng (VND)',
                data: <?= isset($jsonValues1Year) ? $jsonValues1Year : '[]' ?>,
                backgroundColor: 'rgba(13, 202, 240, 0.5)', // Blue color
                borderColor: '#0dcaf0',
                borderWidth: 1
            }]
        },
        options: commonOptions
    });

    // --- 2. Month Chart (Line Chart) ---
    // Ensure $jsonLabels30Days and $jsonValues30Days are passed from controller
    const ctxMonth = document.getElementById('revenueChartMonth').getContext('2d');
    new Chart(ctxMonth, {
        type: 'line',
        data: {
            labels: <?= isset($jsonLabels30Days) ? $jsonLabels30Days : (isset($jsonLabels) ? $jsonLabels : '[]') ?>,
            datasets: [{
                label: 'Doanh thu Ngày (VND)',
                data: <?= isset($jsonValues30Days) ? $jsonValues30Days : (isset($jsonValues) ? $jsonValues : '[]') ?>,
                backgroundColor: 'rgba(255, 46, 99, 0.2)', // Red color
                borderColor: '#ff2e63',
                borderWidth: 2,
                pointBackgroundColor: '#ffffff',
                pointBorderColor: '#ff2e63',
                pointRadius: 4,
                fill: true,
                tension: 0.4
            }]
        },
        options: commonOptions
    });
</script>