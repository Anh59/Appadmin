<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Edit New Group</h1>
<h1>Edit Group</h1>

<form action="<?= site_url('Dashborad/group-update/' . $group['id']) ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?= $group['name'] ?>" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" value="<?= $group['description'] ?>" required>
    </div>
    <button type="submit">Update</button>
</form>

<?= $this->endSection(); ?>
