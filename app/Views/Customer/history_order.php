<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <h1 class="mb-3">Lịch Sử Đơn Hàng</h1>
    <p>Theo dõi các đơn hàng bạn đã hoàn thành.</p>

    <!-- Thanh tìm kiếm -->
    <form action="<?= route_to('history_order') ?>" method="get" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Tìm kiếm tour..." name="search" value="<?= esc($searchQuery) ?>">
            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <!-- Hiển thị lịch sử đơn hàng -->
    <?php if (!empty($bookings)): ?>
    <?php foreach ($bookings as $booking): ?>
        <div class="card mb-3">
            <div class="row g-0 align-items-center">
                <div class="col-md-2">
                    <!-- Hiển thị hình ảnh của tour -->
                    <?php if ($booking['tour_image']): ?>
                        <img src="<?= base_url(esc($booking['tour_image'])) ?>" class="img-fluid rounded-start" alt="<?= esc($booking['tour_name']) ?>">
                    <?php else: ?>
                        <img src="https://via.placeholder.com/150" class="img-fluid rounded-start" alt="Hình ảnh tour không có sẵn">
                    <?php endif; ?>
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($booking['tour_name']) ?></h5>
                        <p class="card-text">
                            <span>Ngày đặt: <?= date('d/m/Y', strtotime($booking['booking_date'])) ?></span><br>
                            <span>Trạng thái: <span class="badge bg-success"><?= esc($booking['status_text']) ?></span></span>
                        </p>
                        <p class="card-text">
                            <span>Tổng tiền: <strong><?= number_format($booking['total_price'], 0, ',', '.') ?> VND</strong></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <?php if ($booking['payment_status'] === 'completed'): ?>
                        <!-- Đơn đã thanh toán -->
                        <a href="<?= route_to('detail_history_order', $booking['id']) ?>" class="btn btn-primary btn-sm mb-2">Chi Tiết</a>
                    <?php elseif ($booking['payment_status'] === 'order_completed'): ?>
                        <!-- Đơn đã hoàn thành -->
                        <a href="<?= route_to('reorder', $booking['id']) ?>" class="btn btn-secondary btn-sm mb-2">Đặt Lại</a>
                        <a href="<?= route_to('reviews', $booking['id']) ?>" class="btn btn-success btn-sm">Đánh Giá</a>
                    <?php elseif ($booking['payment_status'] === 'failed'): ?>
                        <!-- Đơn đã hủy -->
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p class="text-center">Bạn chưa có đơn hàng hoàn thành nào.</p>
<?php endif; ?>


    <!-- Phân trang -->
    <nav aria-label="Page navigation">
        <?= $pager->links('group1', 'bootstrap') ?>
    </nav>
</div>
<?= $this->endSection(); ?>
