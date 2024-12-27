<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <h1 class="mb-3">Đơn Hàng Chờ Xử Lý</h1>
    <p>Quản lý các đơn hàng đang chờ xử lý của bạn.</p>

    <!-- Thanh tìm kiếm -->
    <form action="<?= route_to('order') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tìm kiếm tour..." name="search" value="<?= esc($searchQuery) ?>">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Hiển thị các đơn hàng -->
    <?php if (!empty($bookings)): ?>
        <?php foreach ($bookings as $booking): ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-3">
                        <!-- Hiển thị hình ảnh của tour -->
                        <?php if ($booking['tour_image']): ?>
                            <img src="<?= base_url(relativePath: esc($booking['tour_image'])) ?>" class="img-fluid rounded-start" alt="<?= esc($booking['tour_name']) ?>">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Hình ảnh tour không có sẵn">
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($booking['tour_name']) ?></h5>
                            <p class="card-text"><?= esc($booking['tour_description']) ?></p>
                            <p class="card-text">Tổng giá tiền: 
                                <?= number_format($booking['total_price'], 0, ',', '.') ?> VND
                            </p>
                            <p class="card-text text-warning">
                                Trạng thái: <span class="fw-bold"><?= esc($booking['status_text']) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                        <div class="btn-group-vertical">
                            <button class="btn btn-outline-primary">Đặt lại</button>
                            <button class="btn btn-secondary">Liên hệ</button>
                            <button class="btn btn-primary btn-sm">
                                <a href="<?= route_to('detail_order') ?>" class="text-white text-decoration-none">Chi tiết</a>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy đơn hàng chờ xử lý nào.</p>
    <?php endif; ?>

    <!-- Phân trang -->
    <nav aria-label="Page navigation">
        <?= $pager->links('group1', 'bootstrap') ?>
    </nav>
</div>
<?= $this->endSection(); ?>
