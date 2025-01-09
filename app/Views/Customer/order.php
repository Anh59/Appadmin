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
                <div class="col-md-3 d-flex align-items-center justify-content-center">
    <!-- Hiển thị hình ảnh của tour -->
                <?php if ($booking['tour_image']): ?>
                    <img src="<?= base_url(relativePath: esc($booking['tour_image'])) ?>" 
                        class="img-fluid rounded" 
                        alt="<?= esc($booking['tour_name']) ?>" 
                        style="width: 100%; height: 200px; object-fit: cover;">
                <?php else: ?>
                    <img src="https://via.placeholder.com/150" 
                        class="img-fluid rounded" 
                        alt="Hình ảnh tour không có sẵn" 
                        style="width: 100%; height: 200px; object-fit: cover;">
                <?php endif; ?>
            </div>

                    <div class="col-md-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($booking['tour_name']) ?></h5>
                            <p class="card-text">
                                <?= esc(strlen($booking['tour_description']) > 200 ? substr($booking['tour_description'], 0, 200) . '...' : $booking['tour_description']) ?>
                            </p>
                            <P class="card-text">Mã đơn hàng :<?= esc($booking['id'])?></P>
                            <p class="card-text">Tổng giá tiền: 
                                <?= number_format($booking['total_price'], 0, ',', '.') ?> VND
                            </p>
                            <p class="card-text text-warning">
                                Trạng thái: <span class="fw-bold"><?= esc($booking['status_text']) ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 d-flex align-items-center justify-content-center">
                    <div class="d-flex flex-column align-items-stretch gap-2">
                        <!-- Nút Chi tiết -->
                        <form action="<?= route_to('detail_order', $booking['id']) ?>" method="get">
                            <button type="submit" class="btn btn-primary btn-sm text-white w-100" style="min-width: 120px;">Chi tiết</button>
                        </form>

                        <!-- Nút Liên hệ -->
                        <form action="tel:+84987654321" method="get">
                            <button type="submit" class="btn btn-outline-primary btn-sm w-100" style="min-width: 120px; ">Liên hệ</button>
                        </form>

                        <!-- Nút Huỷ -->
                        <form action="<?= route_to('cancel_order', $booking['id']) ?>" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn huỷ đơn hàng này?')">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-danger btn-sm w-100" style="min-width: 120px;">Huỷ</button>
                        </form>
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
