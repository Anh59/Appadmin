<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Tours') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Tours_Store') ?>" method="post" enctype="multipart/form-data" onsubmit="return handleFormSubmit();">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Tên Tour</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="description">Mô Tả</label>
                <!-- Container cho Quill -->
                <div id="quill-editor" style="height: 200px; border: 1px solid #ced4da;"></div>
                <!-- Input ẩn để lưu nội dung từ Quill -->
                <input type="hidden" id="description" name="description">
            </div>

            <div class="form-group">
                <label for="price_per_person">Giá</label>
                <input type="number" class="form-control" id="price_per_person" name="price_per_person" required>
            </div>

            <div class="form-group">
                <label for="image_url">Hình Ảnh</label>
                <input type="file" class="form-control" id="image_url" name="image_url[]" accept="image/*" multiple required>
                <div id="image-preview" style="margin-top: 10px;"></div>
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
                <label for="location">Địa Điểm</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="form-group">
                <label for="participants">Số Người Tham Gia</label>
                <input type="number" class="form-control" id="participants" name="participants" required>
            </div>

            <div class="form-group">
                <label for="transport_id">Chọn Phương Tiện</label>
                <select class="form-control" id="transport_id" name="transport_id" required>
                    <option value="">-- Chọn phương tiện --</option>
                    <?php foreach ($transports as $transport): ?>
                        <option value="<?= $transport['id'] ?>"><?= $transport['type'] ?> (Tài xế: <?= $transport['driver_name'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="room_ids">Chọn Phòng</label><br>
                <?php 
                $availableRooms = array_filter($rooms, fn($room) => $room['tour_id'] === null); 
                ?>

                <?php if (empty($availableRooms)): ?>
                    <p>Hiện đang hết phòng! Hãy kiểm tra lại danh sách phòng hoặc <a href="<?= route_to('Table_Rooms_Create') ?>">tạo phòng mới</a>.</p>
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

        <!-- Thêm Quill.js -->
        <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

        <script>
            // Khởi tạo Quill
            const quill = new Quill('#quill-editor', {
                theme: 'snow',
                placeholder: 'Nhập mô tả...',
            });

            // Xử lý hiển thị ảnh xem trước
            document.getElementById('image_url').addEventListener('change', function(event) {
                const preview = document.getElementById('image-preview');
                preview.innerHTML = ''; // Xóa ảnh cũ
                const files = event.target.files;
                Array.from(files).forEach(file => {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    img.style.width = '100px';
                    img.style.margin = '5px';
                    img.style.objectFit = 'cover';
                    img.style.height = '100px';
                    preview.appendChild(img);
                });
            });

            // Lấy dữ liệu từ Quill và gán vào input ẩn khi submit
            function handleFormSubmit() {
                const descriptionInput = document.getElementById('description');
                descriptionInput.value = quill.root.innerHTML;
                return true; // Cho phép form submit
            }
        </script>
    </div>
</div>

<?= $this->endSection(); ?>
