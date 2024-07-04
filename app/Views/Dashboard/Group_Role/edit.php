<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Chỉnh sửa Quyền cho Group</h1>

<form action="<?= route_to('Table_GroupRole_Update', $group['id']) ?>" method="post">
    <?= csrf_field() ?>

    <div class="form-group">
        <label for="name">Chức vụ</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $group['name'] ?>" disabled>
    </div>

    <div class="form-group">
        <label for="description">Mô tả chức vụ</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $group['description'] ?>" disabled>
    </div>

    <!-- Hiển thị danh sách quyền -->
    <div class="form-group">
        <label for="roles">Danh sách quyền</label>
        <?php foreach ($roles as $role): ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]" value="<?= $role['id'] ?>" 
                    <?php foreach ($groupRoles as $groupRole): ?>
                        <?= ($groupRole['role_id'] == $role['id']) ? 'checked' : '' ?>
                    <?php endforeach; ?>
                >
                <label class="form-check-label" for="roles"><?= $role['description'] ?></label>
            </div>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
</form>

<?= $this->endSection(); ?>
