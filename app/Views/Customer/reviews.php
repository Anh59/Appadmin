<?= $this->extend('Customer/profile'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
    <div class="d-flex align-items-center mb-3">
        <a href="<?= route_to('history_order') ?>" class="btn btn-circle me-2" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
        <h1 class="m-0">Đánh Giá Tour</h1>
    </div>

    <!-- Hiển thị thông tin đơn đặt hàng và tour -->
    <div class="card mb-3">
        <div class="row g-0">
            <!-- Hiển thị tất cả hình ảnh của tour -->
            <div class="row">
                <?php if (!empty($tour_images)): ?>
                    <?php foreach ($tour_images as $image): ?>
                        <div class="col-md-4 mb-3">
                            <img src="<?= base_url(esc($image['image_url'])) ?>" class="img-fluid rounded" alt="Hình ảnh tour">
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có hình ảnh của tour này.</p>
                <?php endif; ?>
            </div>

            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($booking['tour_name']) ?></h5>
                    <p class="card-text"><?= esc($booking['tour_description']) ?></p>
                    <p class="card-text">
                        <span>Tổng tiền: <strong><?= number_format($booking['total_price'], 0, ',', '.') ?> VND</strong></span><br>
                        <span>Ngày đặt: <?= date('d/m/Y', strtotime($booking['booking_date'])) ?></span><br>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form đánh giá -->
    <h3 class="mb-3">Để lại đánh giá của bạn</h3>
    <?php if ($existingReview): ?>
        <p class="text-warning">Bạn đã đánh giá tour này rồi. Dưới đây là đánh giá của bạn:</p>
        <p><strong>Tiêu đề: </strong><?= esc($existingReview['title']) ?></p>
        <p><strong>Đánh giá: </strong><?= esc($existingReview['content']) ?></p>
        <p><strong>Số sao: </strong><?= esc($existingReview['rating']) ?> / 5</p>
    <?php else: ?>
        <form action="<?= route_to('submitReview', $booking['id']) ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Tiêu đề đánh giá</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Nội dung đánh giá</label>
                <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="rating" class="form-label">Đánh giá (số sao)</label>
                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" required>
            </div>
            <button type="submit" class="btn btn-primary">Gửi đánh giá</button>
        </form>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
