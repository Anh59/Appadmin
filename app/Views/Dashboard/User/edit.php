<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Edit User</h1>

<form action="<?= route_to('Group_update', $group['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $user['email'] ?>" required>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection(); ?>
