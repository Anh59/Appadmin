<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Chỉnh Sửa Quyền</h1>

<form action="<?= route_to('Table_Role_Update', $roles['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="url">Đường Dẫn</label>
        <input type="text" class="form-control" id="url" name="url" value="<?= $roles['url'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mô Tả</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $roles['description'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Lưu Lại</button>
</form>


<?= $this->endSection(); ?>