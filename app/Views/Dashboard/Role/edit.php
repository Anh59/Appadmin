<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Edit Role</h1>

<form action="<?= route_to('Table_Role_Update', $roles['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" value="<?= $roles['url'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $roles['description'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>


<?= $this->endSection(); ?>