<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<form action="<?= route_to('Table_Rooms_Update', $room['id']) ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="name">Tên Phòng:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $room['name'] ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Giá Phòng:</label>
        <input type="number" name="price" id="price" class="form-control" value="<?= $room['price'] ?>" required>
    </div>
    <div class="form-group">
        <label for="quantity">Số Lượng:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="<?= $room['quantity'] ?>" required>
    </div>
    <div class="form-group">
        <label for="tour_id">Chuyến Du Lịch (Tùy chọn):</label>
        <select name="tour_id" id="tour_id" class="form-control">
            <option value="">Trống</option>
            <?php foreach ($tours as $tour): ?>
                <option value="<?= $tour['id'] ?>" <?= $tour['id'] == $room['tour_id'] ? 'selected' : '' ?>>
                    <?= $tour['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Cập Nhật Ảnh:</label>
        <input type="file" name="image" id="image" class="form-control">
        <?php if (!empty($room['image_url'])): ?>
            <p>Ảnh hiện tại:</p>
            <img src="<?= $room['image_url'] ?>" alt="Room Image" style="width: 150px; height: auto;">
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-success">Cập Nhật</button>
    <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-secondary">Quay Lại</a>
</form>

<?= $this->endSection(); ?>
