<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Chỉnh Sửa Tour</h1>

<form action="<?= route_to('Table_Tours_Update', $tour['id']) ?>" method="post">
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
        <label for="price">Giá</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $tour['price_per_person'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Lưu Lại</button>
</form>

<?= $this->endSection(); ?>
