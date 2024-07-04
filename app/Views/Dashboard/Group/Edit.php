<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Chỉnh Sửa Chức Vụ</h1>

<form action="<?= route_to('Group_update', $group['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Chức vụ</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $group['name'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Mổ tả chức vụ</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $group['description'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Lưu </button>
</form>

<?= $this->endSection(); ?>
