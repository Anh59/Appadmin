<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Rooms_Update', $room['id']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Tên Phòng</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= esc($room['name']) ?>" required>
            </div>

            <div class="form-group">
                <label for="price">Giá Phòng</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= esc($room['price']) ?>" required>
            </div>

            <div class="form-group">
                <label for="available_quantity">Số Lượng</label>
                <input type="number" class="form-control" id="available_quantity" name="available_quantity" value="<?= esc($room['available_quantity']) ?>" required>
            </div>

            <div class="form-group">
                <label for="tour_id">Chuyến Du Lịch (Tùy chọn)</label>
                <select name="tour_id" id="tour_id" class="form-control">
                    <option value="">Trống</option>
                    <?php foreach ($tours as $tour): ?>
                        <option value="<?= $tour['id'] ?>" <?= $tour['id'] == $room['tour_id'] ? 'selected' : '' ?>>
                            <?= esc($tour['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Cập Nhật Ảnh</label>
                <input type="file" class="form-control" id="image" name="image">
                <?php if (!empty($room['image_url'])): ?>
                    <p>Ảnh hiện tại:</p>
                    <img src="<?= base_url($room['image_url']) ?>" alt="Room Image" style="width: 150px; height: auto;">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-success">Cập Nhật</button>
            <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
