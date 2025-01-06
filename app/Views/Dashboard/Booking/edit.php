<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Bookings') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Bookings_Update', $booking['id']) ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="customer_id">Khách Hàng</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <?php foreach ($customers as $customer): ?>
                        <option value="<?= $customer['id'] ?>" <?= $booking['customer_id'] == $customer['id'] ? 'selected' : '' ?>>
                            <?= esc($customer['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tour_id">Tour</label>
                <select name="tour_id" id="tour_id" class="form-control" required>
                    <?php foreach ($tours as $tour): ?>
                        <option value="<?= $tour['id'] ?>" <?= $booking['tour_id'] == $tour['id'] ? 'selected' : '' ?>>
                            <?= esc($tour['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="participants">Số Người Tham Gia</label>
                <input type="number" name="participants" id="participants" class="form-control" value="<?= esc($booking['participants']) ?>" required>
            </div>

            <div class="form-group">
                <label for="room_quantity">Số Phòng</label>
                <input type="number" name="room_quantity" id="room_quantity" class="form-control" value="<?= esc($booking['room_quantity']) ?>" required>
            </div>

            <div class="form-group">
                <label for="booking_date">Ngày Đặt</label>
                <input type="date" name="booking_date" id="booking_date" class="form-control" value="<?= esc($booking['booking_date']) ?>" required>
            </div>

            <div class="form-group">
                <label for="payment_method">Phương Thức Thanh Toán</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="COD" <?= $booking['payment_method'] == 'COD' ? 'selected' : '' ?>>COD</option>
                    <option value="PayPal" <?= $booking['payment_method'] == 'PayPal' ? 'selected' : '' ?>>PayPal</option>
                    <option value="MoMo" <?= $booking['payment_method'] == 'MoMo' ? 'selected' : '' ?>>MoMo</option>
                </select>
            </div>

            <div class="form-group">
                <label for="payment_status">Trạng Thái Thanh Toán</label>
                <select name="payment_status" id="payment_status" class="form-control" required>
                    <option value="pending" <?= $booking['payment_status'] == 'pending' ? 'selected' : '' ?>>Chờ thanh toán</option>
                    <option value="completed" <?= $booking['payment_status'] == 'completed' ? 'selected' : '' ?>>Đã thanh toán</option>
                    <option value="order_completed" <?= $booking['payment_status'] == 'order_completed' ? 'selected' : '' ?>>Đã hoàn thành</option>
                    <option value="failed" <?= $booking['payment_status'] == 'failed' ? 'selected' : '' ?>>Đã huỷ</option>
                </select>
            </div>

            <div class="form-group">
                <label for="total_price">Tổng Giá</label>
                <input type="number" name="total_price" id="total_price" class="form-control" value="<?= esc($booking['total_price']) ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="<?= route_to('Table_Bookings') ?>" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
