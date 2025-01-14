<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Tours') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">

        <form action="<?= route_to('Table_Tours_Update', $tour['id']) ?>" method="post" enctype="multipart/form-data" onsubmit="return handleFormSubmit();">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Tên Tour</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $tour['name'] ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả</label>
                <!-- Quill Editor -->
                <div id="quill-editor" style="height: 200px; border: 1px solid #ced4da;">
                    <?= $tour['description'] ?>
                </div>
                <!-- Hidden Input để lưu giá trị -->
                <input type="hidden" id="description" name="description" value="<?= $tour['description'] ?>">
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
                                <input type="hidden" name="existing_images[]" value="<?= $image['id'] ?>">
                            </div>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <p>Chưa có hình ảnh.</p>
                    <?php endif; ?>
                </div>
            </div>
                <div class="form-group">
                    <label for="start_date">Ngày Bắt Đầu</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?= $tour['start_date'] ?>" required>
                </div>

                <!-- End Date -->
                <div class="form-group">
                    <label for="end_date">Ngày Kết Thúc</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="<?= $tour['end_date'] ?>" required>
                </div>

                <!-- Location -->
                <div class="form-group">
                    <label for="location">Địa Điểm</label>
                    <input type="text" class="form-control" id="location" name="location" value="<?= $tour['location'] ?>" required>
                </div>

                <!-- Participants -->
                <div class="form-group">
                    <label for="participants">Số Người Tham Gia</label>
                    <input type="number" class="form-control" id="participants" name="participants" value="<?= $tour['participants'] ?>" required>
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
                                <?= in_array($room['id'], $selectedRoomIds) ? 'checked' : '' ?>>
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
    </div>
</div>
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Nhập mô tả...',
            });
            document.getElementById('description').value = quill.root.innerHTML;

            function handleFormSubmit() {
                const descriptionInput = document.getElementById('description');
                descriptionInput.value = quill.root.innerHTML; // Lấy nội dung từ Quill và gán vào input hidden
                return true; // Cho phép form được submit
            }


            function removeImage(imageId) {
                const container = document.getElementById('image_' + imageId);
                container.style.display = 'none';
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'delete_images[]';
                input.value = imageId;
                container.appendChild(input);
            }

    document.getElementById('image_url').addEventListener('change', function(event) {
    const preview = document.getElementById('image-preview');
    const files = event.target.files;

    Array.from(files).forEach((file, index) => {
        const imgContainer = document.createElement('div');
        imgContainer.classList.add('image-container');

        const img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.style.width = '100px';
        img.style.margin = '5px';
        img.style.objectFit = 'cover';

        const removeButton = document.createElement('button');
        removeButton.type = 'button';
        removeButton.classList.add('btn', 'btn-danger', 'btn-sm');
        removeButton.textContent = 'Xóa';
        removeButton.addEventListener('click', function () {
            preview.removeChild(imgContainer);
        });

        imgContainer.appendChild(img);
        imgContainer.appendChild(removeButton);
        preview.appendChild(imgContainer);
    });
});


function removeImage(imageId) {
    const imageContainer = document.getElementById('image_' + imageId);
    imageContainer.style.display = 'none';

    // Thêm input hidden để đánh dấu ảnh bị xóa
    if (!document.getElementById('delete_image_' + imageId)) {
        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'delete_images[]';
        hiddenInput.value = imageId;
        hiddenInput.id = 'delete_image_' + imageId;
        document.getElementById('image-preview').appendChild(hiddenInput);
    }
}

</script>

<?= $this->endSection(); ?>
