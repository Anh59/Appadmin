<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header" style="border-bottom: none;">
        <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-circle" title="Quay lại">
            <i class="fas fa-arrow-left" style="color: black;"></i>
        </a>
    </div>
    <div class="card-body">
        <form action="<?= route_to('Table_Rooms_Store') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="name">Tên Phòng</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="price">Giá Phòng</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>

            <div class="form-group">
                <label for="available_quantity">Số Lượng</label>
                <input type="number" class="form-control" id="available_quantity" name="available_quantity" required>
            </div>

            <div class="form-group">
                <label for="tour_id">Gán Tour (Tùy chọn)</label>
                <select name="tour_id" id="tour_id" class="form-control">
                    <option value="">Chưa gán</option>
                    <?php foreach ($tours as $tour): ?>
                        <option value="<?= $tour['id'] ?>"><?= $tour['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Ảnh Phòng</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <button type="submit" class="btn btn-success">Thêm Phòng</button>
            <a href="<?= route_to('Table_Rooms') ?>" class="btn btn-secondary">Quay Lại</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
