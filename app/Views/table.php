<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <div class="row">
        <!-- Doanh thu -->
        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= number_format($totalRevenue) ?> VND</h3>
                    <p>Doanh Thu</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Số lượng khách hàng -->
        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $totalCustomers ?></h3>
                    <p>Khách Hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Số lượng tour -->
        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3><?= $totalTours ?></h3>
                    <p>Tổng Số Tour</p>
                </div>
                <div class="icon">
                    <i class="ion ion-flag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- Số đơn đặt hàng -->
        <div class="col-lg-3 col-md-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3><?= $totalBookings ?></h3>
                    <p>Số Đơn Đặt Hàng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-cart"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Biểu đồ và bảng -->
    <div class="row">
        <!-- Cột trái -->
        <div class="col-lg-6">
            <!-- Biểu đồ sóng -->
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">Doanh Thu Theo Ngày</h3>
                </div>
                <div class="card-body">
                    <canvas id="daily-revenue-chart" style="height: 300px;"></canvas>
                </div>
            </div>
            <!-- Biểu đồ cột -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Doanh Thu Hàng Ngày</h3>
                    <form method="get">
                        <label for="month">Chọn Tháng:</label>
                        <input type="month" name="month" id="month" value="<?= $month ?>" onchange="this.form.submit()">
                    </form>
                </div>
                <div class="card-body">
                    <canvas id="monthly-revenue-chart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>

        <!-- Cột phải -->
        <div class="col-lg-6">
    <!-- Hàng trên: Biểu đồ tròn và bảng Top 10 khách hàng -->
    <div class="row">
        <!-- Biểu đồ tỉ lệ đơn hàng -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Tỉ Lệ Đơn Hàng</h3>
                </div>
                <div class="card-body">
                    <canvas id="payment-status-pie-chart" style="height: 250px;"></canvas>
                </div>
            </div>
        </div>
        <!-- Bảng Top 10 khách hàng -->
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">Top 10 Khách Hàng Đặt Nhiều Đơn Nhất</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên Khách Hàng</th>
                                <th>Số Lượng Đơn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($topCustomers as $index => $customer): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= $customer['name'] ?></td>
                                    <td><?= $customer['total_orders'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Hàng dưới: Bảng Top 5 tour -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Top 5 Tour Du Lịch Được Đặt Nhiều Nhất</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên Tour</th>
                        <th>Số Lần Đặt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($topTours as $index => $tour): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $tour['name'] ?></td>
                            <td><?= $tour['total_bookings'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Biểu đồ doanh thu hàng ngày
    var dailyRevenueData = <?= json_encode($dailyRevenue); ?>;
    var dailyRevenueLabels = dailyRevenueData.map(function(item) { return item.date; });
    var dailyRevenueValues = dailyRevenueData.map(function(item) { return item.total_revenue; });

    new Chart(document.getElementById('daily-revenue-chart'), {
        type: 'line', // Dạng biểu đồ vẫn là 'line' nhưng thêm fill để tạo dạng sóng
        data: {
            labels: dailyRevenueLabels,
            datasets: [{
                label: 'Doanh Thu Hàng Ngày',
                data: dailyRevenueValues,
                borderColor: '#3e95cd',
                backgroundColor: 'rgba(62, 149, 205, 0.4)', // Màu nền cho sóng
                fill: true, // Kích hoạt vùng sóng
                tension: 0.4, // Độ cong của sóng
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Ngày'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Doanh Thu'
                    },
                    beginAtZero: true
                }
            }
        }
    }); 
    // Biểu đồ tỉ lệ đơn hàng
var paymentStatusData = <?= json_encode($paymentStatusData); ?>;

// Tổng số tất cả trạng thái
var totalPayments = paymentStatusData.reduce((sum, item) => sum + parseInt(item.count), 0);

// Dữ liệu nhãn và giá trị cho biểu đồ
var statusLabels = paymentStatusData.map(item => {
    switch (item.payment_status) {
        case 'pending': return 'Đang Chờ';
        case 'completed': return 'Đã Thanh Toán';
        case 'failed': return 'Đã Hủy';
        case 'order_completed': return 'Đã Hoàn Thành';
        default: return item.payment_status;
    }
});

var statusValues = paymentStatusData.map(item => parseInt(item.count));

// Tính phần trăm cho từng trạng thái
var statusPercentages = paymentStatusData.map(item => {
    var percentage = ((parseInt(item.count) / totalPayments) * 100).toFixed(1);
    return percentage + '%';
});

// Tạo biểu đồ tỉ lệ trạng thái thanh toán
new Chart(document.getElementById('payment-status-pie-chart'), {
    type: 'pie',
    data: {
        labels: statusLabels.map((label, index) => `${label} (${statusPercentages[index]})`),
        datasets: [{
            data: statusValues,
            backgroundColor: ['#4caf50', '#fbc02d', '#d32f2f', '#2196f3'], // Màu sắc
            borderColor: ['#fff'],
            borderWidth: 1
        }]
    }
});


    // Biểu đồ tăng trưởng doanh thu
    var monthlyRevenueData = <?= json_encode($monthlyRevenue); ?>;
    var monthlyLabels = monthlyRevenueData.map(item => item.day);
    var monthlyValues = monthlyRevenueData.map(item => item.total_revenue);

    new Chart(document.getElementById('monthly-revenue-chart'), {
        type: 'bar',
        data: {
            labels: monthlyLabels,
            datasets: [{
                label: 'Doanh Thu',
                data: monthlyValues,
                backgroundColor: '#4e73df',
                borderColor: '#4e73df',
                borderWidth: 1
            }]
        }
    });
    

</script>
<?= $this->endSection(); ?>
