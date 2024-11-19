<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Thêm Tour Mới</h1>

<form action="<?= route_to('Table_Tours_Store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Tên Tour</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>

    <div class="form-group">
        <label for="description">Mô Tả</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>

    <div class="form-group">
        <label for="price_per_person">Giá</label>
        <input type="number" class="form-control" id="price_per_person" name="price_per_person" required>
    </div>

    <!-- Chọn và hiển thị ảnh -->
    <div class="form-group">
        <label for="image_url">Hình Ảnh</label>
        <input type="file" class="form-control" id="image_url" name="image_url[]" accept="image/*" multiple required>
        <div id="image-preview" style="margin-top: 10px;"></div>
    </div>

    <!-- Chọn phương tiện -->
    <div class="form-group">
            <label for="transport_id">Chọn Phương Tiện</label>
            <select class="form-control" id="transport_id" name="transport_id" required>
                <option value="">-- Chọn phương tiện --</option>
                <?php foreach ($transports as $transport): ?>
                    <option value="<?= $transport['id'] ?>"><?= $transport['type'] ?> (Tài xế: <?= $transport['driver_name'] ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

    <!-- Chọn nhiều phòng -->
    <div class="form-group">
        <label for="room_ids">Chọn Phòng</label><br>
        <?php foreach ($rooms as $room): ?>
            <?php if ($room['tour_id'] === null): // Chỉ hiển thị phòng chưa có tour nào gán ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="room_ids[]" id="room_<?= $room['id'] ?>" value="<?= $room['id'] ?>">
                    <label class="form-check-label" for="room_<?= $room['id'] ?>">
                        <?= $room['name'] ?> (Giá: <?= $room['price'] ?>)
                    </label>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary">Tạo</button>
</form>

<script>
    // Hiển thị các ảnh đã chọn khi người dùng upload
    document.getElementById('image_url').addEventListener('change', function(event) {
        const preview = document.getElementById('image-preview');
        const files = event.target.files;
        
        // Lặp qua các ảnh đã chọn và tạo phần preview
        Array.from(files).forEach(file => {
            const img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.style.width = '100px'; // Kích thước ảnh preview
            img.style.margin = '5px';
            img.style.objectFit = 'cover'; // Đảm bảo ảnh không bị méo
            img.style.height = '100px'; // Đặt chiều cao cho ảnh preview
            preview.appendChild(img);
        });
    });
</script>

<?= $this->endSection(); ?>
