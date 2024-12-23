<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div>
    <h1>Lịch Sử Đơn Hàng</h1>
    <p>Theo dõi các đơn hàng bạn đã đặt.</p>
    <div class="order-history">
        <!-- Đơn hàng -->
        <div class="card mb-3">
            <div class="row g-0 align-items-center">
                <div class="col-md-2">
                    <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" class="img-fluid rounded-start" alt="Tour Đà Nẵng">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">Tour du lịch Đà Nẵng</h5>
                        <p class="card-text">
                            <span>Ngày đặt: 01/12/2024</span><br>
                            <span>Ngày khởi hành: 05/12/2024</span><br>
                            <span>Trạng thái: <span class="badge bg-success">Hoàn tất</span></span>
                        </p>
                        <p class="card-text">
                            <span>Tiền gốc: <del>5,000,000 VND</del></span><br>
                            <span>Khuyến mãi: <strong>4,500,000 VND</strong></span><br>
                            <span>Tổng tiền: <strong>4,500,000 VND</strong></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <button class="btn btn-primary btn-sm mb-2">Xem Chi Tiết</button>
                    <button class="btn btn-secondary btn-sm mb-2">Đặt Lại</button>
                    <button class="btn btn-success btn-sm">Đánh Giá</button>
                </div>
            </div>
        </div>

        <!-- Đơn hàng khác -->
        <div class="card mb-3">
            <div class="row g-0 align-items-center">
                <div class="col-md-2">
                    <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" class="img-fluid rounded-start" alt="Tour Nha Trang">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">Tour du lịch Nha Trang</h5>
                        <p class="card-text">
                            <span>Ngày đặt: 10/11/2024</span><br>
                            <span>Ngày khởi hành: 15/11/2024</span><br>
                            <span>Trạng thái: <span class="badge bg-success">Hoàn tất</span></span>
                        </p>
                        <p class="card-text">
                            <span>Tiền gốc: <del>6,000,000 VND</del></span><br>
                            <span>Khuyến mãi: <strong>5,500,000 VND</strong></span><br>
                            <span>Tổng tiền: <strong>5,500,000 VND</strong></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <button class="btn btn-primary btn-sm mb-2">Xem Chi Tiết</button>
                    <button class="btn btn-secondary btn-sm mb-2">Đặt Lại</button>
                    <button class="btn btn-success btn-sm">Đánh Giá</button>
                </div>
            </div>
        </div>

        <!-- Đơn hàng khác -->
        <div class="card mb-3">
            <div class="row g-0 align-items-center">
                <div class="col-md-2">
                    <img src="https://storage.googleapis.com/a1aa/image/1pXaIlwXJrbWMBElhEHDNQVXzm6LY7ePTB37T0SzRMGBku4JA.jpg" class="img-fluid rounded-start" alt="Tour Phú Quốc">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title">Tour du lịch Phú Quốc</h5>
                        <p class="card-text">
                            <span>Ngày đặt: 15/10/2024</span><br>
                            <span>Ngày khởi hành: 20/10/2024</span><br>
                            <span>Trạng thái: <span class="badge bg-success">Hoàn tất</span></span>
                        </p>
                        <p class="card-text">
                            <span>Tiền gốc: <del>7,000,000 VND</del></span><br>
                            <span>Khuyến mãi: <strong>6,500,000 VND</strong></span><br>
                            <span>Tổng tiền: <strong>6,500,000 VND</strong></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <button class="btn btn-primary btn-sm mb-2">Xem Chi Tiết</button>
                    <button class="btn btn-secondary btn-sm mb-2">Đặt Lại</button>
                    <button class="btn btn-success btn-sm">Đánh Giá</button>
                </div>
            </div>
        </div>

        <!-- Phân trang -->
        <div class="pagination mt-3">
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
