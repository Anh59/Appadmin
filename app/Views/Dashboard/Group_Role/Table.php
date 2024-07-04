<?= $this->extend('layout/index'); ?>
<?= $this->section('content'); ?>

<h1>Danh sách Group và Quyền</h1>

<table id="table" class="display" style="width:100%">
    <thead>
        <tr>
            <th>STT</th>
            <th>CHỨC VỤ</th>
            <th>MÔ TẢ CHỨC VỤ</th>
            <th>QUYỀN</th>
            <th>CHỨC NĂNG</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($groups as $group): ?>
        <tr>
            <td><?= $group['id'] ?></td>
            <td><?= $group['name'] ?></td>
            <td><?= $group['description'] ?></td>
            <td>
                <?php foreach ($groupRoles as $groupRole): ?>
                    <?php if ($groupRole['group_id'] == $group['id']): ?>
                        <?= $groupRole['role_id'] ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </td>
            <td>
                <a href="<?= route_to('Table_GroupRole_Edit' , $group['id']) ?>"><span class="badge badge-pill badge-primary">Sửa</span></a>
                <form action="<?= route_to('Table_GroupRole_Delete' , $group['id']) ?>" method="post" style="display:inline;">
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa nhóm này và các quyền liên quan?')">Xóa</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-2.0.7/b-3.0.2/sl-2.0.2/datatables.min.js"></script>
<script src="<?= base_url('js/datatable.js') ?>">
   
</script>

<?= $this->endSection(); ?>
