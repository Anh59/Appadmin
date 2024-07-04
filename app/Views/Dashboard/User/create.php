<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Tạo Tài khoản</h1>

<?php if (session()->has('success')): ?>
    <div class="alert alert-success"><?= session()->get('success') ?></div>
<?php endif; ?>
<?php if (session()->has('error')): ?>
    <div class="alert alert-danger"><?= session()->get('error') ?></div>
<?php endif; ?>

<form action="<?= route_to('Table_User_Store') ?>" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="username">Tên người dùng</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="group_id">Nhóm</label>
        <select name="group_id" id="group_id" class="form-control" required>
            <?php foreach ($groups as $group): ?>
                <option value="<?= $group['id'] ?>">
                    <?= $group['name'] ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Tạo mới</button>
</form>

<?= $this->endSection(); ?>
