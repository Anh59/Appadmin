<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Role_Store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Dường Dẫn</label>
        <input type="text" class="form-control" id="name" name="url" required>
    </div>

    <div class="form-group">
        <label for="description">Mô Tả</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>

    <button type="submit" class="btn btn-primary">Tạo</button>
</form>

<?= $this->endSection(); ?>