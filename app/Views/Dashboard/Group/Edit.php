<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Edit Group</h1>

<form action="<?= route_to('Group_update', $group['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $group['name'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $group['description'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>
