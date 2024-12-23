<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <h1 class="mb-3">Đơn Hàng Của Bạn</h1>
    <p>Quản lý đơn hàng của bạn</p>

    <!-- Đơn hàng 1 -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" 
                     class="img-fluid rounded-start" alt="Hình ảnh địa điểm du lịch">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Tour du lịch Đà Nẵng</h5>
                    <p class="card-text">Thông tin chi tiết về tour du lịch Đà Nẵng.</p>
                    <p class="card-text">Tiền gốc: <span class="text-decoration-line-through">5,000,000 VND</span></p>
                    <p class="card-text text-success fw-bold">Tiền khuyến mại: 4,500,000 VND</p>
                    <p class="card-text fw-bold">Tổng giá tiền: 4,500,000 VND</p>
                    <p class="card-text text-success">Trạng thái: <span class="fw-bold">Đã thanh toán</span></p>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <div class="btn-group-vertical">
                    <button class="btn btn-outline-primary">Đặt lại</button>
                    <button class="btn btn-secondary">Liên hệ</button>
                    <button class="btn btn-primary">Chi tiết</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Đơn hàng 2 -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" 
                     class="img-fluid rounded-start" alt="Hình ảnh địa điểm du lịch">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Tour du lịch Nha Trang</h5>
                    <p class="card-text">Thông tin chi tiết về tour du lịch Nha Trang.</p>
                    <p class="card-text">Tiền gốc: <span class="text-decoration-line-through">6,000,000 VND</span></p>
                    <p class="card-text text-success fw-bold">Tiền khuyến mại: 5,500,000 VND</p>
                    <p class="card-text fw-bold">Tổng giá tiền: 5,500,000 VND</p>
                    <p class="card-text text-danger">Trạng thái: <span class="fw-bold">Chưa thanh toán</span></p>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <div class="btn-group-vertical">
                    <button class="btn btn-outline-primary">Đặt lại</button>
                    <button class="btn btn-secondary">Liên hệ</button>
                    <button class="btn btn-primary">Chi tiết</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Đơn hàng 3 -->
    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-3">
                <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" 
                     class="img-fluid rounded-start" alt="Hình ảnh địa điểm du lịch">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title">Tour du lịch Phú Quốc</h5>
                    <p class="card-text">Thông tin chi tiết về tour du lịch Phú Quốc.</p>
                    <p class="card-text">Tiền gốc: <span class="text-decoration-line-through">7,000,000 VND</span></p>
                    <p class="card-text text-success fw-bold">Tiền khuyến mại: 6,500,000 VND</p>
                    <p class="card-text fw-bold">Tổng giá tiền: 6,500,000 VND</p>
                    <p class="card-text text-warning">Trạng thái: <span class="fw-bold">Đang chờ tư vấn</span></p>
                </div>
            </div>
            <div class="col-md-3 d-flex align-items-center justify-content-center">
                <div class="btn-group-vertical">
                    <button class="btn btn-outline-primary">Đặt lại</button>
                    <button class="btn btn-secondary">Liên hệ</button>
                    <button class="btn btn-primary">Chi tiết</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Phân trang -->
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
    </nav>
</div>
<?= $this->endSection(); ?>
