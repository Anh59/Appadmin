<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Thêm Tour Mới</h1>

<form action="<?= route_to('Table_Tours_Store') ?>" method="post">
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
        <label for="price">Giá</label>
        <input type="number" class="form-control" id="price" name="price" required>
    </div>

    <div class="form-group">
        <label for="image_url">URL Hình Ảnh</label>
        <input type="text" class="form-control" id="image_url" name="image_url" required>
    </div>

    <div class="form-group">
        <label for="transport_type">Phương Tiện</label>
        <input type="text" class="form-control" id="transport_type" name="transport_type" required>
    </div>

    <div class="form-group">
        <label for="room_type">Loại Phòng</label>
        <input type="text" class="form-control" id="room_type" name="room_type" required>
    </div>

    <div class="form-group">
        <label for="price_per_night">Giá Phòng/Night</label>
        <input type="number" class="form-control" id="price_per_night" name="price_per_night" required>
    </div>

    <button type="submit" class="btn btn-primary">Tạo</button>
</form>

<?= $this->endSection(); ?>
