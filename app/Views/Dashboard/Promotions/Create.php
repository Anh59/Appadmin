<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Promotions_Store') ?>" method="POST">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="discount_code">Mã Giảm Giá</label>
        <input type="text" name="discount_code" id="discount_code" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="discount_value">Phần Trăm Giảm Giá</label>
        <input type="number" name="discount_value" id="discount_value" class="form-control" min="1" max="100" required>
    </div>

    <div class="form-group">
        <label for="promotion_details">Chi Tiết Mã Giảm Giá</label>
        <textarea name="promotion_details" id="promotion_details" class="form-control" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="start_date">Ngày Bắt Đầu</label>
        <input type="date" name="start_date" id="start_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_date">Ngày Kết Thúc</label>
        <input type="date" name="end_date" id="end_date" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="applies_to_all_tours">Áp Dụng Cho Tất Cả Các Tour</label>
        <input type="checkbox" name="applies_to_all_tours" id="applies_to_all_tours" value="1">
        <p>Chọn để áp dụng cho tất cả các tour</p>
    </div>

    <div class="form-group" id="specific_tours">
        <label>Chọn Các Tour Áp Dụng</label>
        <?php foreach ($tours as $tour): ?>
            <div>
                <input type="checkbox" name="tour_ids[]" value="<?= $tour['id'] ?>" id="tour_<?= $tour['id'] ?>">
                <label for="tour_<?= $tour['id'] ?>"><?= $tour['name'] ?></label>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-success">Lưu</button>
</form>

<script>
    // Lắng nghe sự kiện thay đổi của checkbox "Áp Dụng Cho Tất Cả Các Tour"
    document.getElementById('applies_to_all_tours').addEventListener('change', function () {
        var specificToursDiv = document.getElementById('specific_tours');
        if (this.checked) {
            specificToursDiv.style.display = 'none'; // Ẩn phần chọn tour cụ thể khi chọn "Áp Dụng Cho Tất Cả Các Tour"
            // Tự động bỏ chọn các tour nếu người dùng chọn "Áp Dụng Cho Tất Cả Các Tour"
            var checkboxes = document.querySelectorAll('input[name="tour_ids[]"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        } else {
            specificToursDiv.style.display = 'block'; // Hiển thị phần chọn tour khi không chọn "ALL"
        }
    });

    // Khi form được tải, kiểm tra nếu checkbox "Áp Dụng Cho Tất Cả Các Tour" đã được chọn hay chưa
    window.addEventListener('load', function() {
        if (document.getElementById('applies_to_all_tours').checked) {
            document.getElementById('specific_tours').style.display = 'none'; // Ẩn nếu đã chọn "ALL"
        } else {
            document.getElementById('specific_tours').style.display = 'block'; // Hiển thị phần chọn tour cụ thể
        }
    });
</script>

<?= $this->endSection(); ?>
