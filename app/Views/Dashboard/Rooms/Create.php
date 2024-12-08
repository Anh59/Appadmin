<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>


<form action="<?= route_to('Table_Rooms_Store') ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="name">Tên Phòng:</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="price">Giá Phòng:</label>
        <input type="number" name="price" id="price" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="available_quantity">Số Lượng:</label>
        <input type="number" name="available_quantity" id="available_quantity" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="tour_id">Gán Tour (Tùy chọn):</label>
        <select name="tour_id" id="tour_id" class="form-control">
            <option value="">Chưa gán</option>
            <?php foreach ($tours as $tour): ?>
                <option value="<?= $tour['id'] ?>"><?= $tour['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Ảnh Phòng:</label>
        <input type="file" name="image" id="image" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Thêm Phòng</button>
    <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-secondary">Quay Lại</a>
</form>

<?= $this->endSection(); ?>
