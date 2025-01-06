<?= $this->extend('layout/index'); ?>

<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Promotions') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Promotions_Store') ?>" method="POST">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="discount_code">Mã Giảm Giá</label>
                <input type="text" class="form-control" id="discount_code" name="discount_code" required>
            </div>

            <div class="form-group">
                <label for="discount_value">Giá Trị Giảm Giá</label>
                <input type="number" class="form-control" id="discount_value" name="discount_value" min="1" required>
            </div>

            <div class="form-group">
                <label for="promotion_details">Chi Tiết Mã Giảm Giá</label>
                <textarea class="form-control" id="promotion_details" name="promotion_details" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="start_date">Ngày Bắt Đầu</label>
                <input type="date" class="form-control" id="start_date" name="start_date" required>
            </div>

            <div class="form-group">
                <label for="end_date">Ngày Kết Thúc</label>
                <input type="date" class="form-control" id="end_date" name="end_date" required>
            </div>

            <div class="form-group">
                <label for="applies_to_all_tours">Áp Dụng Cho Tất Cả Các Tour</label>
                <input type="checkbox" id="applies_to_all_tours" name="applies_to_all_tours" value="1">
                <p>Chọn để áp dụng cho tất cả các tour</p>
            </div>

            <div class="form-group" id="specific_tours">
                <label>Chọn Các Tour Áp Dụng</label>
                <?php foreach ($tours as $tour): ?>
                    <div>
                        <input type="checkbox" id="tour_<?= $tour['id'] ?>" name="tour_ids[]" value="<?= $tour['id'] ?>">
                        <label for="tour_<?= $tour['id'] ?>"><?= $tour['name'] ?></label>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="submit" class="btn btn-primary">Tạo</button>
        </form>
    </div>
</div>

<script>
    document.getElementById('applies_to_all_tours').addEventListener('change', function () {
        var specificToursDiv = document.getElementById('specific_tours');
        if (this.checked) {
            specificToursDiv.style.display = 'none';
            var checkboxes = document.querySelectorAll('input[name="tour_ids[]"]');
            checkboxes.forEach(function (checkbox) {
                checkbox.checked = false;
            });
        } else {
            specificToursDiv.style.display = 'block';
        }
    });

    window.addEventListener('load', function () {
        if (document.getElementById('applies_to_all_tours').checked) {
            document.getElementById('specific_tours').style.display = 'none';
        } else {
            document.getElementById('specific_tours').style.display = 'block';
        }
    });
</script>

<?= $this->endSection(); ?>
