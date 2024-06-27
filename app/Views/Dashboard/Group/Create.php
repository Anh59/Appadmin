<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Create New Group</h1>

<form action="<?= base_url('Dashborad/table-store') ?>" method="post">
    <?= csrf_field() ?>
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" name="description" id="description" required>
    </div>
    <button type="submit">Create</button>
</form>

<?= $this->endSection(); ?>
