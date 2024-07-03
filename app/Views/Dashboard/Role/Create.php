<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<form action="<?= route_to('Table_Role_Store') ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">URL</label>
        <input type="text" class="form-control" id="name" name="url" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" required>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?= $this->endSection(); ?>