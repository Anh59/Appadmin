<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<style>
.carousel-control-prev, 
.carousel-control-next {
    background-color: transparent; /* Loại bỏ nền đen */
    border: none; /* Loại bỏ viền */
   /* Đặt màu nút thành đen hoặc bất kỳ màu bạn muốn */
}

</style>
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
            <i class="fas fa-check-circle fa-3x <?= $booking['payment_status'] == 'test' ? 'text-success' : '' ?>"></i>
            <div class="mt-2">Đặt đơn thành công</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-clock fa-3x <?= $booking['payment_status'] == 'pending' ? 'text-warning' : 'text-muted' ?>"></i>
            <div class="mt-2">Chờ thanh toán</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-credit-card fa-3x <?= $booking['payment_status'] == 'completed' ? 'text-warning' : 'text-muted' ?>"></i>
            <div class="mt-2">Hoàn tất thanh toán</div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <i class="fas fa-flag-checkered fa-3x <?= $booking['payment_status'] == 'order_completed' ? 'text-success' : 'text-muted' ?>"></i>
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
                    <p><strong>Tên chuyến du lịch:</strong> <?= esc($booking['tour_name']) ?></p>
                    <p><strong>Ngày đặt:</strong> <?= date('d/m/Y', strtotime($booking['booking_date'])) ?></p>
                    <p><strong>Thời gian:</strong> 2 ngày</p>
                    <p><strong>Địa điểm:</strong> <?= esc($booking['tour_location']) ?></p>
                    <p><strong>Giá vé:</strong> <?= number_format($booking['price_per_person'], 0, ',', '.') ?> VND/người</p>
                    <p><strong>Số lượng người tham gia:</strong> <?= esc($booking['participants']) ?></p>
                    <!-- <p><strong>Tổng số lượng phòng:</strong> <?= esc($booking['room_quantity']) ?></p> -->
                    <p><strong>Tổng tiền:</strong> <?= number_format($booking['total_price'] , 0, ',', '.') ?> VND</p>
                </div>
            </div>
        </div>


        <!-- Cột thông tin người dùng -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Thông tin người dùng</h4>
                        <p><strong>Họ tên:</strong> <?= esc($customer['name']) ?></p>
                        <p><strong>Email:</strong> <?= esc($customer['email']) ?></p>
                        <p><strong>Số điện thoại:</strong> <?= esc($customer['phone']) ?></p>
                        <p><strong>Địa chỉ:</strong> <?= esc($customer['address']) ?></p>
                    </div>
                </div>
            </div>

    </div>

    <!-- Thông tin phòng đã đặt -->
    <div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title mb-3">Thông tin phòng đã đặt</h4>
                <?php if (!empty($booking_rooms)): ?>
                    <!-- Carousel -->
                    <div id="roomImagesCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($booking_rooms as $index => $room): ?>
                                <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="<?= base_url(esc($room['image_url'])) ?>" class="d-block w-100 rounded" alt="Hình ảnh phòng">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <h5 class="card-title">Tên phòng: <?= esc($room['room_name']) ?></h5>
                                                <p class="card-text">Số lượng: <?= esc($room['quantity']) ?></p>
                                                <p class="card-text"><strong>Thông tin phòng: </strong><?= esc(isset($room['cancellation']) ? $room['cancellation'] : 'Không có thông tin') ?></p>
                                                <p class="card-text"><strong>Tiện ích: </strong><?= esc(isset($room['extra']) ? $room['extra'] : 'Không có tiện ích thêm') ?></p>
                                                <p class="card-text">Giá: <?= number_format($room['price'], 0, ',', '.') ?> VND</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#roomImagesCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#roomImagesCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                <?php else: ?>
                    <p>Không có thông tin phòng đã đặt.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


    <!-- Các nút hành động -->
    <div class="d-flex justify-content-center">
        <a href="<?= route_to('order') ?>" class="btn btn-primary me-2" role="button">
           THANH TOÁN
        </a>
        <a href="<?= route_to('review', $booking['id']) ?>" class="btn btn-secondary" role="button">
            HUỶ
        </a>
    </div>
</div>
<?= $this->endSection(); ?>
