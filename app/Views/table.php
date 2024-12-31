<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
      <div class="row">
          <!-- Doanh thu -->
          <div class="col-lg-3">
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
          <div class="col-lg-3">
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
          <div class="col-lg-3">
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
          <div class="col-lg-3">
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


    <!-- Biểu đồ doanh thu -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Doanh Thu Theo Ngày
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="daily-revenue-chart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
        <!-- Biểu đồ khách hàng -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Khách Hàng
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="customer-pie-chart" style="height: 300px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ tăng trưởng doanh thu -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Tăng Trưởng Doanh Thu
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="revenue-growth-chart" style="height: 300px;"></canvas>
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
        type: 'line',
        data: {
            labels: dailyRevenueLabels,
            datasets: [{
                label: 'Doanh Thu Hàng Ngày',
                data: dailyRevenueValues,
                borderColor: '#3e95cd',
                fill: false
            }]
        }
    });

    // Biểu đồ khách hàng
    var customerData = <?= json_encode($totalCustomers); ?>;
    new Chart(document.getElementById('customer-pie-chart'), {
        type: 'pie',
        data: {
            labels: ['Khách Hàng'],
            datasets: [{
                data: [customerData],
                backgroundColor: ['#ffb84d'],
                borderColor: ['#fff'],
                borderWidth: 1
            }]
        }
    });

    // Biểu đồ tăng trưởng doanh thu
    new Chart(document.getElementById('revenue-growth-chart'), {
        type: 'bar',
        data: {
            labels: dailyRevenueLabels,
            datasets: [{
                label: 'Doanh Thu',
                data: dailyRevenueValues,
                backgroundColor: '#4e73df',
                borderColor: '#4e73df',
                borderWidth: 1
            }]
        }
    });
</script>
<?= $this->endSection(); ?>
