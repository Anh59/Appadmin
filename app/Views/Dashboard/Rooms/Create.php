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
        <textarea class="form-control" id="description" name="description"></textarea>
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
    <?php 
    // Kiểm tra có phòng khả dụng hay không
    $availableRooms = array_filter($rooms, fn($room) => $room['tour_id'] === null); 
    ?>

    <?php if (empty($availableRooms)): ?>
        <p>Hiện đang hết phòng! Hãy kiểm tra lại danh sách phòng hoặc <a href="<?= route_to('create_room') ?>">tạo phòng mới</a>.</p>
    <?php else: ?>
        <?php foreach ($availableRooms as $room): ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="room_ids[]" id="room_<?= $room['id'] ?>" value="<?= $room['id'] ?>">
                <label class="form-check-label" for="room_<?= $room['id'] ?>">
                    <?= $room['name'] ?> (Giá: <?= $room['price'] ?>)
                </label>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>


    <button type="submit" class="btn btn-primary">Tạo</button>
</form>

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.25.0-lts/standard/ckeditor.js"></script> -->
<script>
    CKEDITOR.replace('description');
</script>
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
