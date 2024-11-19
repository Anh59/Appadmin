<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Sửa Tour</h1>

<!-- Form chỉnh sửa tour -->
<form action="<?= route_to('Table_Tours_Update', $tour['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Tên Tour</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $tour['name'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô Tả</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $tour['description'] ?>" required>
    </div>

    <div class="form-group">
        <label for="price_per_person">Giá</label>
        <input type="number" class="form-control" id="price_per_person" name="price_per_person" value="<?= $tour['price_per_person'] ?>" required>
    </div>

    <div class="form-group">
        <label for="image_url">Hình Ảnh</label>
        <input type="file" class="form-control" id="image_url" name="image_url[]" accept="image/*" multiple>
        <div id="image-preview" style="margin-top: 10px;">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $image): ?>
                    <div class="image-container" id="image_<?= $image['id'] ?>">
                        <img src="<?= base_url($image['image_url']) ?>" style="width: 100px; margin: 5px; object-fit: cover;">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeImage(<?= $image['id'] ?>)">Xóa</button>
                        <input type="hidden" name="delete_images[]" value="<?= $image['id'] ?>" id="delete_image_<?= $image['id'] ?>" />
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Chưa có hình ảnh.</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="form-group">
        <label for="transport_id">Chọn Phương Tiện</label>
        <select class="form-control" id="transport_id" name="transport_id" required>
            <option value="">-- Chọn phương tiện --</option>
            <?php foreach ($transports as $transport): ?>
                <option value="<?= $transport['id'] ?>" <?= $transport['id'] == $tour['transport_id'] ? 'selected' : '' ?>>
                    <?= $transport['type'] ?> (Tài xế: <?= $transport['driver_name'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="room_ids">Chọn Phòng</label><br>
        <?php if (!empty($rooms)): ?>  
            <?php foreach ($rooms as $room): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="room_ids[]" id="room_<?= $room['id'] ?>" value="<?= $room['id'] ?>" 
                        <?php if (in_array($room['id'], $selectedRoomIds)): ?> checked <?php endif; ?>>
                    <label class="form-check-label" for="room_<?= $room['id'] ?>">
                        <?= $room['name'] ?> (Giá: <?= $room['price'] ?>)
                    </label>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Chưa có phòng nào.</p>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary">Cập Nhật</button>
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
            img.style.objectFit = 'cover';
            preview.appendChild(img);
        });
    });

    // Xóa ảnh khỏi giao diện khi nhấn nút "Xóa"
    function removeImage(imageId) {
        // Ẩn phần tử ảnh trong giao diện
        const imageContainer = document.getElementById('image_' + imageId);
        imageContainer.style.display = 'none';
        
        // Đánh dấu hình ảnh để xóa khi gửi form (chỉ xóa trên giao diện)
        const hiddenInput = document.getElementById('delete_image_' + imageId);
        hiddenInput.value = imageId;
    }
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
            img.style.objectFit = 'cover';
            preview.appendChild(img);
        });
    });

    // Xóa ảnh khỏi giao diện khi nhấn nút "Xóa"
    function removeImage(imageId) {
        // Ẩn phần tử ảnh trong giao diện
        const imageContainer = document.getElementById('image_' + imageId);
        imageContainer.style.display = 'none';
        
        // Đánh dấu hình ảnh để xóa khi gửi form (chỉ xóa trên giao diện)
        const hiddenInput = document.getElementById('delete_image_' + imageId);
        hiddenInput.value = imageId;
    }
</script>

<?= $this->endSection(); ?>
