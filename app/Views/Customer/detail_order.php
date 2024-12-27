<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <div class="d-flex align-items-center mb-3">
        <a href="<?= route_to('order') ?>" class="btn btn-circle me-2" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
        <h1 class="m-0">Trạng thái đơn hàng</h1>
    </div>

    <!-- Thanh trạng thái đơn hàng -->
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-check-circle fa-3x text-success"></i>
            <div class="mt-2">Đặt đơn thành công</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-clock fa-3x text-warning"></i>
            <div class="mt-2">Chờ thanh toán</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-credit-card fa-3x text-warning"></i>
            <div class="mt-2">Hoàn tất thanh toán</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-flag-checkered fa-3x text-success"></i>
            <div class="mt-2">Hoàn thành</div>
        </div>
    </div>

    <!-- Đường kẻ nối giữa các trạng thái -->
    <div class="d-flex justify-content-between my-3">
        <div class="border-top w-100" style="height: 2px;"></div>
    </div>

    <!-- Thông tin chuyến du lịch và thông tin người dùng -->
    <div class="row">
        <!-- Cột thông tin chuyến đi -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title mb-3">Thông tin chuyến du lịch</h4>
                    <p><strong>Tên chuyến du lịch:</strong> Du lịch biển Hạ Long</p>
                    <p><strong>Ngày khởi hành:</strong> 15/01/2025</p>
                    <p><strong>Thời gian:</strong> 4 ngày 3 đêm</p>
                    <p><strong>Địa điểm:</strong> Hạ Long - Quảng Ninh</p>
                    <p><strong>Giá vé:</strong> 3,500,000 VND/người</p>
                </div>
            </div>
        </div>

        <!-- Cột thông tin người dùng -->
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="card-title mb-3">Thông tin người dùng</h4>
                    <p><strong>Họ tên:</strong> Nguyễn Văn A</p>
                    <p><strong>Email:</strong> example@email.com</p>
                    <p><strong>Số điện thoại:</strong> 0123456789</p>
                    <p><strong>Địa chỉ:</strong> 123 Đường ABC, Phường XYZ, Quận 1, TP.HCM</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Các nút hành động -->
    <div class="d-flex justify-content-center">
        <a href="danh-sach-chuyen-du-lich.html" class="btn btn-primary me-2" role="button">
            Về trang danh sách chuyến du lịch
        </a>
        <a href="chi-tiet-don-hang.html" class="btn btn-secondary" role="button">
            Xem chi tiết đơn hàng
        </a>
    </div>
</div>
<?= $this->endSection(); ?>
